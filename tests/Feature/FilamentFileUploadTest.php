<?php

namespace Tests\Feature;

use App\Filament\Resources\Community\Posts\Pages\EditPost;
use App\Filament\Resources\Marketplace\Categories\Pages\EditCategory;
use App\Filament\Resources\Marketplace\Products\Pages\CreateProduct;
use App\Filament\Resources\Marketplace\Products\Pages\EditProduct;
use App\Filament\Resources\PlantGuide\Plants\Pages\CreatePlant;
use App\Filament\Resources\PlantGuide\Plants\Pages\EditPlant;
use App\Models\Category;
use App\Models\User;
use App\Modules\Community\Domain\Models\Post;
use App\Modules\Marketplace\Domain\Models\Product;
use App\Modules\Marketplace\Domain\Models\Store;
use App\Modules\Marketplace\Domain\Models\StoreCatalog;
use App\Modules\PlantGuide\Domain\Models\Plant;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Livewire\Livewire;
use Tests\TestCase;

class FilamentFileUploadTest extends TestCase
{
    use LazilyRefreshDatabase;

    protected function createAdminUser(): User
    {
        return User::factory()->create([
            'user_type' => 'admin',
        ]);
    }

    public function test_edit_product_page_hydrates_file_upload_correctly(): void
    {
        $admin = $this->createAdminUser();
        Storage::fake('public');

        Storage::disk('public')->put('products/main/test.jpg', 'image-content');

        $store = Store::create([
            'user_id' => $admin->id,
            'store_name' => 'متجر تجريبي',
            'store_type' => 'بذور',
        ]);

        Category::create([
            'name' => 'بذور زراعية',
            'type' => 'marketplace',
            'slug' => 'seeds',
        ]);

        $product = Product::create([
            'store_id' => $store->id,
            'name' => 'منتج تجريبي',
            'category' => 'بذور زراعية',
            'description' => 'وصف المنتج',
            'price' => 100,
            'unit' => 'حبة',
            'stock_quantity' => 10,
            'image_url' => 'products/main/test.jpg',
        ]);

        $component = Livewire::actingAs($admin)
            ->test(EditProduct::class, [
                'record' => $product->getKey(),
            ]);

        $component->assertSuccessful();

        $state = $component->get('data.image_url');
        $this->assertNotEmpty($state, 'image_url in data should not be empty');

        $files = $component->instance()->form->getComponent('image_url')->getUploadedFiles();
        $this->assertNotEmpty($files, 'getUploadedFiles() should return existing file');

        $component->call('save')
            ->assertHasNoFormErrors();

        $product->refresh();
        $this->assertSame('products/main/test.jpg', $product->getRawOriginal('image_url'));
    }

    public function test_edit_plant_page_hydrates_file_upload_correctly(): void
    {
        $admin = $this->createAdminUser();
        Storage::fake('public');

        Storage::disk('public')->put('plants/test_plant.jpg', 'plant-content');

        $category = Category::create([
            'name' => 'خضروات',
            'slug' => 'vegetables',
        ]);

        $plant = Plant::create([
            'category_id' => $category->id,
            'scientific_name' => 'Solanum lycopersicum',
            'common_name' => 'طماطم',
            'description' => 'وصف الطماطم',
            'image_url' => 'plants/test_plant.jpg',
        ]);

        $component = Livewire::actingAs($admin)
            ->test(EditPlant::class, [
                'record' => $plant->getKey(),
            ]);

        $component->assertSuccessful();

        $files = $component->instance()->form->getComponent('image_url')->getUploadedFiles();
        $this->assertNotEmpty($files, 'getUploadedFiles() for plant should return existing file');
    }

    public function test_create_plant_page_can_upload_file(): void
    {
        $admin = $this->createAdminUser();
        Storage::fake('public');

        $file = UploadedFile::fake()->image('tomato.jpg', 600, 600);

        $category = Category::create([
            'name' => 'خضروات',
            'type' => 'crop',
            'slug' => 'vegetables',
        ]);

        $component = Livewire::actingAs($admin)
            ->test(CreatePlant::class)
            ->fillForm([
                'category_id' => $category->id,
                'scientific_name' => 'Solanum lycopersicum',
                'common_name' => 'طماطم',
                'description' => 'وصف الطماطم',
                'image_url' => $file,
            ])
            ->call('create')
            ->assertHasNoFormErrors();

        $this->assertDatabaseHas('plants', [
            'common_name' => 'طماطم',
        ]);
    }

    public function test_create_product_page_can_upload_file(): void
    {
        $admin = $this->createAdminUser();
        Storage::fake('public');

        $file = UploadedFile::fake()->image('product.jpg', 600, 600);

        $store = Store::create([
            'user_id' => $admin->id,
            'store_name' => 'متجر تجريبي',
            'store_type' => 'بذور',
        ]);

        Category::create([
            'name' => 'بذور زراعية',
            'type' => 'marketplace',
            'slug' => 'seeds',
        ]);

        $component = Livewire::actingAs($admin)
            ->test(CreateProduct::class)
            ->fillForm([
                'store_id' => $store->id,
                'name' => 'منتج جديد',
                'category' => 'بذور زراعية',
                'description' => 'وصف منتج جديد',
                'price' => 150,
                'unit' => 'حبة',
                'stock_quantity' => 20,
                'payment_methods' => ['cash'],
                'image_url' => $file,
            ])
            ->call('create')
            ->assertHasNoFormErrors();

        $this->assertDatabaseHas('products', [
            'name' => 'منتج جديد',
        ]);
    }

    public function test_edit_category_page_hydrates_file_upload_correctly(): void
    {
        $admin = $this->createAdminUser();
        Storage::fake('public');

        Storage::disk('public')->put('categories/test_cat.jpg', 'cat-content');

        $store = Store::create([
            'user_id' => $admin->id,
            'store_name' => 'متجر تجريبي',
            'store_type' => 'بذور',
        ]);

        $catalog = StoreCatalog::create([
            'store_id' => $store->id,
            'name' => 'قسم البذور',
            'image_url' => 'categories/test_cat.jpg',
            'sort_order' => 1,
        ]);

        $component = Livewire::actingAs($admin)
            ->test(EditCategory::class, [
                'record' => $catalog->getKey(),
            ]);

        $component->assertSuccessful();

        $state = $component->get('data.image_url');
        $this->assertNotEmpty($state, 'image_url in data should not be empty for category');

        $files = $component->instance()->form->getComponent('image_url')->getUploadedFiles();
        $this->assertNotEmpty($files, 'getUploadedFiles() should return existing file for category');

        $component->call('save')
            ->assertHasNoFormErrors();

        $catalog->refresh();
        $this->assertSame('categories/test_cat.jpg', $catalog->getRawOriginal('image_url'));
    }

    public function test_edit_post_page_hydrates_file_upload_correctly(): void
    {
        $admin = $this->createAdminUser();
        Storage::fake('public');

        Storage::disk('public')->put('community/posts/test_post.jpg', 'post-content');

        $post = Post::create([
            'user_id' => $admin->id,
            'title' => 'منشور تجريبي',
            'content' => 'محتوى المنشور التجريبي',
            'image_url' => 'community/posts/test_post.jpg',
        ]);

        $component = Livewire::actingAs($admin)
            ->test(EditPost::class, [
                'record' => $post->getKey(),
            ]);

        $component->assertSuccessful();

        $state = $component->get('data.image_url');
        $this->assertNotEmpty($state, 'image_url in data should not be empty for post');

        $files = $component->instance()->form->getComponent('image_url')->getUploadedFiles();
        $this->assertNotEmpty($files, 'getUploadedFiles() should return existing file for post');

        $component->call('save')
            ->assertHasNoFormErrors();

        $post->refresh();
        $this->assertSame('community/posts/test_post.jpg', $post->getRawOriginal('image_url'));
    }

    public function test_storage_route_serves_existing_file_with_cors_headers(): void
    {
        $testDir = storage_path('app/public/test_route');
        if (! is_dir($testDir)) {
            mkdir($testDir, 0755, true);
        }
        file_put_contents($testDir.'/sample.txt', 'test-content');

        try {
            $response = $this->get('/storage/test_route/sample.txt');

            $response->assertOk();
            $response->assertHeader('Access-Control-Allow-Origin', '*');
            $this->assertSame(realpath($testDir.'/sample.txt'), realpath($response->getFile()->getPathname()));
        } finally {
            @unlink($testDir.'/sample.txt');
            @rmdir($testDir);
        }
    }

    public function test_storage_route_returns_svg_placeholder_when_file_does_not_exist(): void
    {
        $response = $this->get('/storage/non_existent_image_12345.jpg');

        $response->assertOk();
        $response->assertHeader('Content-Type', 'image/svg+xml');
        $this->assertStringContainsString('<svg', $response->getContent());
    }
}
