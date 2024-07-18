<?php

namespace App\Providers;

use App\Repositories\CartRepository;
use App\Repositories\CartRepositoryInterface;
use App\Repositories\CategoryRepository;
use App\Repositories\CategoryRepositoryInterface;
use App\Repositories\ProductRepository;
use App\Repositories\ProductRepositoryInterface;
use App\Repositories\WishlistRepository;
use App\Repositories\WishlistRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RouterServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(CategoryRepositoryInterface::class, CategoryRepository::class);
        $this->app->singleton(ProductRepositoryInterface::class ,ProductRepository::class);
        $this->app->singleton(WishlistRepositoryInterface::class, WishlistRepository::class);
        $this->app->singleton(CartRepositoryInterface::class, CartRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
