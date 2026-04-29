<?php

namespace App\Modules\Marketplace\Application\Services;

use App\Modules\Marketplace\Domain\Exceptions\BusinessLogicException;
use App\Modules\Marketplace\Domain\Exceptions\ResourceNotFoundException;
use App\Modules\Marketplace\Domain\Exceptions\UnauthorizedAccessException;
use App\Modules\Marketplace\Domain\Models\Order;
use App\Modules\Marketplace\Domain\Models\OrderItem;
use App\Modules\Marketplace\Domain\Models\Product;
use App\Modules\Marketplace\Domain\Models\Store;
use App\Modules\Marketplace\Domain\Models\StoreCatalog;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\UploadedFile;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class MarketplaceService
{
    // =========================================================
    // PRODUCTS
    // =========================================================

    /**
     * جلب كل المنتجات مع Pagination وبدون N+1.
     *
     * withAvg و withCount يُنتجان query واحدة فقط بدل N queries.
     */
    public function getAllProducts(int $perPage = 20, bool $onlyFeatured = false, ?string $query = null): LengthAwarePaginator
    {
        if ($onlyFeatured && $perPage === 20 && empty($query)) {
            return Cache::remember('marketplace_featured_products', 3600, function () use ($perPage) {
                return Product::with(['store:id,store_name,slug', 'catalog:id,name,slug'])
                    ->featured()
                    ->withAvg('reviews', 'rating')
                    ->withCount('reviews')
                    ->latest()
                    ->paginate($perPage);
            });
        }

        return Product::with(['store:id,store_name,slug', 'catalog:id,name,slug', 'media'])
            ->when($onlyFeatured, fn ($q) => $q->featured())
            ->when($query, function ($q) use ($query) {
                $q->where(function ($sub) use ($query) {
                    $sub->where('name', 'like', "%{$query}%")
                        ->orWhere('description', 'like', "%{$query}%");
                });
            })
            ->withAvg('reviews', 'rating')
            ->withCount('reviews')
            ->latest()
            ->paginate($perPage);
    }

    /**
     * جلب منتجات متجر معين مع فلترة اختيارية بالكتالوج.
     */
    public function getStoreProducts(Store $store, ?int $catalogId = null, int $perPage = 20): LengthAwarePaginator
    {
        // Global scope Handles isolation if called from Seller context.
        // Explicit $store->products() is safer for public/admin use.
        return $store->products()
            ->when($catalogId !== null, fn ($q) => $q->forCatalog($catalogId))
            ->with(['catalog:id,name,slug', 'media'])
            ->withAvg('reviews', 'rating')
            ->withCount('reviews')
            ->latest()
            ->paginate($perPage);
    }

    /**
     * إنشاء منتج جديد.
     */
    public function createProduct(Store $store, array $data, ?UploadedFile $mainImage = null, array $otherImages = []): Product
    {
        $product = $store->products()->create(Arr::except($data, ['image', 'images', 'main_image', 'gallery']));

        if ($mainImage) {
            $product->addMedia($mainImage)->toMediaCollection('main_image');
        }

        foreach ($otherImages as $image) {
            $product->addMedia($image)->toMediaCollection('gallery');
        }

        if ($product->is_featured) {
            Cache::forget('marketplace_featured_products');
        }

        return $product->load(['media', 'catalog:id,name']);
    }

    /**
     * تحديث منتج موجود.
     */
    public function updateProduct(Product $product, array $data, ?UploadedFile $mainImage = null, array $otherImages = []): Product
    {
        $product->update(Arr::except($data, ['image', 'images']));

        if ($mainImage) {
            $product->clearMediaCollection('main_image');
            $product->addMedia($mainImage)->toMediaCollection('main_image');
        }

        foreach ($otherImages as $image) {
            $product->addMedia($image)->toMediaCollection('gallery');
        }

        // Clear cache if featured status changed or if it is featured
        if (isset($data['is_featured']) || $product->is_featured) {
            Cache::forget('marketplace_featured_products');
        }

        return $product->load(['media', 'catalog:id,name']);
    }

    /**
     * حذف منتج وصوره.
     */
    public function deleteProduct(Product $product): bool
    {
        if ($product->is_featured) {
            Cache::forget('marketplace_featured_products');
        }

        return $product->delete();
    }

    // =========================================================
    // STORE
    // =========================================================

    /**
     * جلب متجر البائع الحالي مع كل علاقاته.
     */
    public function getSellerStore($user): ?Store
    {
        return $user->store()
            ->with([
                'catalogs' => fn ($q) => $q->withCount('products')->ordered()->with(['media']),
                'products' => fn ($q) => $q->with('media')->latest(),
                'media',
            ])
            ->withCount(['products', 'catalogs'])
            ->first();
    }

    /**
     * إنشاء متجر جديد للمستخدم.
     */
    public function createStore($user, array $data, ?UploadedFile $cover = null): Store
    {
        $store = Store::create(array_merge(
            Arr::except($data, ['cover_image']),
            ['user_id' => $user->id]
        ));

        if ($cover) {
            $store->addMedia($cover)->toMediaCollection('cover');
        }

        return $store->fresh(['media']);
    }

    /**
     * جلب متجر عام مع كتالوجاته (للمشتري).
     * المنتجات تُجلب بشكل منفصل عبر endpoint الترقيم لتحسين الأداء.
     */
    public function getPublicStore(string $slug): Store
    {
        $store = Store::where('slug', $slug)
            ->orWhere('id', $slug)
            ->with([
                'catalogs' => fn ($q) => $q->withCount('products')->ordered()->with(['media']),
                // ✅ تمت إزالة products من هنا لأننا نجلبها بـ pagination منفصل
                'media',
            ])
            ->withCount(['products', 'catalogs'])
            ->withAvg('reviews as reviews_avg_rating', 'rating')
            ->first();

        if (! $store) {
            throw new ResourceNotFoundException('المتجر');
        }

        return $store;
    }

    /**
     * جلب جميع المتاجر للصفحة الرئيسية بـ Pagination مع دعم فلترة المسافة.
     */
    public function getAllStores(int $perPage = 20, ?string $query = null, ?float $latitude = null, ?float $longitude = null): LengthAwarePaginator
    {
        return Store::with(['catalogs' => fn ($q) => $q->ordered(), 'media'])
            ->when($query, function ($q) use ($query) {
                $q->where(function ($sub) use ($query) {
                    $sub->where('store_name', 'like', "%{$query}%")
                        ->orWhere('description', 'like', "%{$query}%")
                        ->orWhere('address', 'like', "%{$query}%");
                });
            })
            ->when($latitude !== null && $longitude !== null, function ($q) use ($latitude, $longitude) {
                $q->nearestTo($latitude, $longitude);
            })
            ->when($latitude === null || $longitude === null, function ($q) {
                $q->latest();
            })
            ->withCount('products')
            ->withAvg('reviews as reviews_avg_rating', 'rating')
            ->paginate($perPage);
    }

    /**
     * تحديث إعدادات المتجر.
     */
    public function updateStore(Store $store, array $data, ?UploadedFile $cover = null): Store
    {
        if ($cover) {
            $store->clearMediaCollection('cover');
            $store->addMedia($cover)->toMediaCollection('cover');
        }

        $store->update(Arr::except($data, ['cover_image']));

        return $store->fresh(['media']);
    }

    // =========================================================
    // CATALOGS
    // =========================================================

    /**
     * جلب كتالوجات متجر البائع مع عدد المنتجات.
     */
    public function getSellerCatalogs(Store $store): Collection
    {
        return $store->catalogs()
            ->with(['media'])
            ->withCount('products')
            ->get();
    }

    /**
     * إنشاء كتالوج جديد.
     * sort_order يُحسب تلقائياً (آخر catalog + 1).
     */
    public function createCatalog(Store $store, array $data, ?UploadedFile $image = null): StoreCatalog
    {
        // حساب sort_order تلقائياً
        $data['sort_order'] = $store->catalogs()->max('sort_order') + 1;

        $catalog = $store->catalogs()->create(Arr::except($data, ['image', 'catalog_image']));

        if ($image) {
            $catalog->addMedia($image)->toMediaCollection('catalog_image');
        }

        return $catalog->load('media');
    }

    /**
     * تحديث كتالوج موجود.
     */
    public function updateCatalog(StoreCatalog $catalog, array $data, ?UploadedFile $image = null): StoreCatalog
    {
        $catalog->update(Arr::except($data, ['image']));

        if ($image) {
            $catalog->clearMediaCollection('catalog_image');
            $catalog->addMedia($image)->toMediaCollection('catalog_image');
        }

        return $catalog->loadCount('products')->load('media');
    }

    /**
     * حذف كتالوج.
     * المنتجات التابعة له ستصبح catalog_id = null تلقائياً (nullOnDelete).
     */
    public function deleteCatalog(StoreCatalog $catalog): bool
    {
        return $catalog->delete();
    }

    /**
     * ربط مجموعة منتجات بكتالوج معين بشكل مجمع (Batch).
     */
    public function assignProductsToCatalog(StoreCatalog $catalog, array $productIds): void
    {
        // The global scope 'store_scope' will automatically restrict Product::whereIn
        // to the current store if called from a seller management route.
        // We still verify count to ensure all requested products were found/accessible.
        $ownedCount = Product::whereIn('id', $productIds)->count();

        if ($ownedCount !== count(array_unique($productIds))) {
            throw new BusinessLogicException('بعض المنتجات المحددة لا تنتمي لمتجرك أو غير موجودة.');
        }

        DB::transaction(function () use ($catalog, $productIds) {
            // 1. تصفير الـ catalog_id لجميع المنتجات التي كانت تنتمي لهذا الكتالوج سابقاً
            Product::where('catalog_id', $catalog->id)
                ->where('store_id', $catalog->store_id)
                ->update(['catalog_id' => null]);

            // 2. تحديث المنتجات الجديدة المحددة
            if (! empty($productIds)) {
                Product::whereIn('id', $productIds)
                    ->where('store_id', $catalog->store_id)
                    ->update(['catalog_id' => $catalog->id]);
            }
        });
    }

    // =========================================================
    // ORDERS
    // =========================================================

    /**
     * إتمام طلب جديد داخل Transaction.
     */
    public function placeOrder($user, array $data, ?UploadedFile $receiptImage = null): Order
    {
        Log::info('Placing split order', ['user_id' => $user->id]);

        return DB::transaction(function () use ($user, $data, $receiptImage) {
            $receiptUrl = null;
            if ($receiptImage) {
                $path = $receiptImage->store('receipts', 'public');
                $receiptUrl = Storage::url($path);
            }

            // 1. جلب كل المنتجات وتجميعها حسب المتجر مع الترتيب لتجنب Deadlocks
            $productIds = collect($data['items'])->pluck('product_id')->unique()->sort()->values()->all();
            $products = Product::whereIn('id', $productIds)->orderBy('id')->lockForUpdate()->get()->keyBy('id');

            $itemsByStore = [];
            foreach ($data['items'] as $item) {
                $product = $products->get($item['product_id']);
                if (! $product) {
                    throw new ResourceNotFoundException('المنتج '.$item['product_id']);
                }
                $itemsByStore[$product->store_id][] = [
                    'item' => $item,
                    'product' => $product,
                ];
            }

            $createdOrders = [];
            foreach ($itemsByStore as $storeId => $group) {
                // حساب إجمالي هذا المتجر فقط
                $storeTotal = collect($group)->sum(fn ($g) => $g['product']->price * $g['item']['quantity']);

                $order = Order::create([
                    'user_id' => $user->id,
                    'store_id' => $storeId,
                    'total_price' => $storeTotal,
                    'status' => 'pending',
                    'shipping_address' => $data['shipping_address'] ?? 'غير محدد',
                    'notes' => $data['notes'] ?? null,
                    'payment_method' => $data['payment_method'],
                    'payment_status' => in_array($data['payment_method'], ['cash', 'bank_transfer']) ? 'pending' : 'completed',
                    'receipt_image' => $receiptUrl,
                ]);

                $orderItems = [];
                foreach ($group as $g) {
                    $item = $g['item'];
                    $product = $g['product'];

                    if ($product->stock_quantity < $item['quantity']) {
                        throw new BusinessLogicException('الكمية المطلوبة من "'.$product->name.'" غير متوفرة');
                    }

                    $orderItems[] = [
                        'order_id' => $order->id,
                        'product_id' => $item['product_id'],
                        'quantity' => $item['quantity'],
                        'price_at_purchase' => $product->price,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];

                    $product->decrement('stock_quantity', $item['quantity']);
                }

                OrderItem::insert($orderItems);
                $createdOrders[] = $order;
            }

            // مسح الكاش إذا كان هناك منتجات مميزة
            if ($products->where('is_featured', true)->isNotEmpty()) {
                Cache::forget('marketplace_featured_products');
            }

            // نرجع أول طلب للمحافظة على توافق الـ API حالياً
            // المستخدم سيجد كل الطلبات في قائمة "طلباتي"
            Log::info('Orders placed successfully', ['count' => count($createdOrders)]);

            // إضافة معلومات الطلبات المجمعة (للموبايل)
            $mainOrder = $createdOrders[0];
            $mainOrder->related_order_ids = array_map(fn ($o) => $o->id, $createdOrders);

            return $mainOrder->load('items.product:id,name');
        });
    }

    /**
     * جلب طلبات المتجر مع منتجاتها.
     */
    public function getStoreOrders(Store $store, int $perPage = 20): LengthAwarePaginator
    {
        return Order::where('store_id', $store->id)
            ->with([
                'items.product:id,name,store_id',
                'user:id,name,phone',
            ])
            ->latest()
            ->paginate($perPage);
    }

    /**
     * إلغاء الطلب.
     */
    public function cancelOrder(Order $order, $userId): Order
    {
        // التحقق من الصلاحية: صاحب الطلب أو صاحب المتجر
        if ($order->user_id !== $userId && $order->store->user_id !== $userId) {
            throw new UnauthorizedAccessException('ليس لديك صلاحية لإلغاء هذا الطلب.');
        }

        // لا يمكن الإلغاء إلا إذا كان الطلب قيد الانتظار أو المعالجة
        if (! in_array($order->status, ['pending', 'processing'])) {
            throw new BusinessLogicException("لا يمكن إلغاء الطلب في حالته الحالية ({$order->status}).");
        }

        DB::transaction(function () use ($order) {
            $order->update(['status' => 'cancelled']);
            $this->restoreStock($order);
        });

        return $order;
    }

    /**
     * استعادة المخزون عند إلغاء الطلب.
     */
    public function restoreStock(Order $order): void
    {
        DB::transaction(function () use ($order) {
            $items = $order->items->sortBy('product_id');
            foreach ($items as $item) {
                if ($item->product) {
                    $item->product->increment('stock_quantity', $item->quantity);
                }
            }

            // Clear cache if featured products are involved
            if ($order->items->pluck('product')->where('is_featured', true)->isNotEmpty()) {
                Cache::forget('marketplace_featured_products');
            }
        });
    }

    // =========================================================
    // PRIVATE HELPERS
    // =========================================================

    /**
     * حذف ملف من Storage بأمان.
     */
    private function deleteFileFromStorage(?string $url): void
    {
        if (! $url) {
            return;
        }

        // تحويل URL إلى مسار Storage نسبي
        $path = ltrim(str_replace('/storage/', '', parse_url($url, PHP_URL_PATH)), '/');

        if (Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
    }
}
