<?php

namespace App\Providers;

use App\Models\Order;
use App\Models\Product;
use Ecommerce\Domains\Order\Policies\OrderPolicy;
use Ecommerce\Domains\Product\Policies\ProductPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Carbon;
use Laravel\Passport\Passport;

final class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Order::class => OrderPolicy::class,
        Product::class => ProductPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Passport::tokensExpireIn(Carbon::now()->addDay());
        Passport::refreshTokensExpireIn(Carbon::now()->addDays(3));
        Passport::personalAccessTokensExpireIn(Carbon::now()->addDays(2));
    }
}
