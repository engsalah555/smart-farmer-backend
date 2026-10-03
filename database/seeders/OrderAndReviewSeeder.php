<?php

namespace Database\Seeders;

use App\Models\User;
use App\Modules\Marketplace\Domain\Models\Order;
use App\Modules\Marketplace\Domain\Models\OrderItem;
use App\Modules\Marketplace\Domain\Models\Product;
use App\Modules\Marketplace\Domain\Models\ProductReview;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class OrderAndReviewSeeder extends Seeder
{
    public function run(): void
    {
        $farmers = User::whereIn('user_type', ['farmer', 'user'])->get();
        if ($farmers->isEmpty()) {
            return;
        }

        $products = Product::with('store')->get();
        if ($products->isEmpty()) {
            return;
        }

        // 1. Create Product Reviews
        $reviewComments = [
            'ما شاء الله، جودة ممتازة جداً ونسبة الإنبات تجاوزت 95% بعد أسبوع من الغرس.',
            'منتج أصلي مطابق للمواصفات، استخدامي له أنقذ محصول الطماطم من اللفحة المبكرة.',
            'تعامل المتجر ممتاز والتوصيل إلى المزرعة في الموعد المحدد، شكراً تطبيق زرعة.',
            'جودة عالية وخامة تتحمل حرارة الشمس وأشعة الصيف دون تشقق.',
            'أنصح كل مزارعي المنطقة بتجربة هذا الصنف، إنتاجيته غزيرة وأحجام الثمار ممتازة.',
            'سعر مناسب مقارنة بالسوق المحلي والمنتج أثبت فاعلية عالية وسريعة.',
        ];

        foreach ($products->take(15) as $idx => $prod) {
            $reviewer = $farmers->random();
            ProductReview::create([
                'product_id' => $prod->id,
                'user_id' => $reviewer->id,
                'rating' => ($idx % 4 === 0) ? 4 : 5,
                'comment' => $reviewComments[$idx % count($reviewComments)],
                'created_at' => now()->subDays(rand(2, 30)),
            ]);
        }

        // 2. Create Orders
        $stores = $products->pluck('store')->unique('id');

        foreach ($stores->take(4) as $store) {
            $buyer = $farmers->random();
            $storeProducts = $products->where('store_id', $store->id);
            if ($storeProducts->isEmpty()) {
                continue;
            }

            $orderItems = $storeProducts->take(2);
            $total = 0;
            $itemsData = [];

            foreach ($orderItems as $item) {
                $qty = rand(1, 4);
                $total += $item->price * $qty;
                $itemsData[] = [
                    'product_id' => $item->id,
                    'quantity' => $qty,
                    'price' => $item->price,
                ];
            }

            $order = Order::create([
                'user_id' => $buyer->id,
                'store_id' => $store->id,
                'total_price' => $total,
                'status' => 'completed',
                'shipping_address' => 'صنعاء - بني مطر - مزرعة وادي بني مطر',
                'notes' => 'يرجى التأكد من إحكام إغلاق العبوات أثناء النقل',
                'payment_method' => 'bank_transfer',
                'payment_status' => 'paid',
                'transaction_id' => 'TXN-'.strtoupper(Str::random(10)),
                'created_at' => now()->subDays(rand(3, 15)),
            ]);

            foreach ($itemsData as $idat) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $idat['product_id'],
                    'quantity' => $idat['quantity'],
                    'price_at_purchase' => $idat['price'],
                ]);
            }
        }
    }
}
