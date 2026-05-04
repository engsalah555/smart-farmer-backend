<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\User;
use App\Observers\CategoryObserver;
use App\Modules\Marketplace\Domain\Models\Order;
use App\Modules\Marketplace\Domain\Models\Product;
use App\Modules\Marketplace\Domain\Models\Store;
use App\Policies\OrderPolicy;
use App\Policies\ProductPolicy;
use App\Policies\StorePolicy;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // ─── أمان: منع Lazy Loading في بيئة التطوير لكشف N+1 مبكراً ───
        Model::preventLazyLoading(app()->isLocal());

        // ─── حماية: منع التعديل غير الصريح على البيانات ───
        Model::preventSilentlyDiscardingAttributes(app()->isLocal());

        // ─── تحسين الأداء: حد أقصى لعدد Queries لكل Request في Production ───
        if (app()->isProduction()) {
            DB::whenQueryingForLongerThan(1000, function () {
                Log::warning('Slow query detected (>1s)');
            });
        }

        // ─── الصلاحيات (Gates) ───
        Gate::define('sell', function ($user) {
            return $user->isSeller();
        });

        Gate::define('admin', function (User $user) {
            return $user->user_type === 'admin';
        });

        // ─── ربط السياسات بنماذج الدومين ───
        Gate::policy(Product::class, ProductPolicy::class);
        Gate::policy(Store::class, StorePolicy::class);
        Gate::policy(Order::class, OrderPolicy::class);

        // ─── Rate Limiters ───
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        RateLimiter::for('auth', function (Request $request) {
            return Limit::perMinute(5)->by($request->ip());
        });

        // ─── المراقبون (Observers) ───
        Category::observe(CategoryObserver::class);
    }
}
