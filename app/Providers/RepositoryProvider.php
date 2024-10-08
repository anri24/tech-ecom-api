<?php

declare(strict_types=1);

namespace App\Providers;

use App\Repositories\{CartRepository,
    CategoryRepository,
    Contracts\CartRepositoryInterface,
    Contracts\CategoryRepositoryInterface,
    Contracts\ProductRepositoryInterface,
    Contracts\UserRepositoryInterface,
    Contracts\WishlistRepositoryInterface,
    ProductRepository,
    UserRepository,
    WishlistRepository};
use Illuminate\Support\ServiceProvider;

class RepositoryProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(
            CategoryRepositoryInterface::class,
            CategoryRepository::class
        );
        $this->app->singleton(
            ProductRepositoryInterface::class,
            ProductRepository::class
        );
        $this->app->singleton(
            WishlistRepositoryInterface::class,
            WishlistRepository::class
        );
        $this->app->singleton(CartRepositoryInterface::class,
            CartRepository::class
        );
        $this->app->singleton(UserRepositoryInterface::class,
            UserRepository::class
        );
    }

    public function boot(): void
    {
        //
    }
}
