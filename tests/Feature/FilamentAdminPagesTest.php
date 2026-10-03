<?php

namespace Tests\Feature;

use App\Models\User;
use App\Modules\Marketplace\Domain\Models\Store;
use App\Modules\Marketplace\Domain\Models\StoreCatalog;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Tests\TestCase;

class FilamentAdminPagesTest extends TestCase
{
    use LazilyRefreshDatabase;

    protected function createAdminUser(): User
    {
        return User::factory()->create([
            'user_type' => 'admin',
        ]);
    }

    public function test_marketplace_categories_page_loads_without_query_exception(): void
    {
        $admin = $this->createAdminUser();

        $seller = User::factory()->create(['user_type' => 'seller']);
        $store = Store::create([
            'user_id' => $seller->id,
            'store_name' => 'متجر المزارع السعيد',
            'store_type' => 'بذور',
        ]);

        StoreCatalog::create([
            'store_id' => $store->id,
            'name' => 'بذور الطماطم',
            'sort_order' => 1,
        ]);

        $response = $this->actingAs($admin)
            ->get('/admin/marketplace/categories');

        $response->assertSuccessful();
        $response->assertSee('متجر المزارع السعيد');
        $response->assertSee('بذور الطماطم');
    }

    public function test_all_filament_admin_index_pages_load_without_server_error(): void
    {
        $admin = $this->createAdminUser();

        $routes = [
            '/admin/marketplace/categories',
            '/admin/marketplace/marketplace-categories',
            '/admin/marketplace/products',
            '/admin/marketplace/stores',
            '/admin/marketplace/orders',
            '/admin/plant-guide/plants',
            '/admin/plant-guide/crops',
            '/admin/community/posts',
            '/admin/community/post-reports',
            '/admin/iot-devices',
            '/admin/users',
            '/admin/payment-methods',
            '/admin/verifications/verification-requests',
        ];

        foreach ($routes as $route) {
            $response = $this->actingAs($admin)->get($route);
            $this->assertTrue(
                $response->status() >= 200 && $response->status() < 400,
                "Route {$route} failed with status {$response->status()}"
            );
        }
    }

    public function test_all_filament_admin_create_pages_load_without_server_error(): void
    {
        $admin = $this->createAdminUser();

        $routes = [
            '/admin/marketplace/categories/create',
            '/admin/marketplace/marketplace-categories/create',
            '/admin/marketplace/products/create',
            '/admin/marketplace/stores/create',
            '/admin/marketplace/orders/create',
            '/admin/plant-guide/plants/create',
            '/admin/plant-guide/crops/create',
            '/admin/community/posts/create',
            '/admin/community/post-reports/create',
            '/admin/iot-devices/create',
            '/admin/users/create',
            '/admin/payment-methods/create',
            '/admin/plant-guide/categories/plant-categories/create',
        ];

        foreach ($routes as $route) {
            $response = $this->actingAs($admin)->get($route);
            $this->assertTrue(
                $response->status() >= 200 && $response->status() < 400,
                "Route {$route} failed with status {$response->status()}"
            );
        }
    }
}
