<?php

declare(strict_types=1);

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GoogleAuth;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WishlistController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

// it need to add middleware where admin can use this routes.
Route::controller(UserController::class)->group(function (){
    Route::get('user/all','index');
    Route::get('user/{id}','show');
    Route::post('user/store','store');
    Route::post('user/update/{id}','store');
});

Route::post('/google-auth', [GoogleAuth::class, 'loginOrRegister']);

//Route::prefix('v1')->group(function () {
//    require_once __DIR__ . '/.admin.php';
//    require_once __DIR__ . '/.public.php';
//});

require __DIR__ . '/auth.php';

//Route::middleware(['auth:sanctum'])->group(function () {

    Route::controller(CategoryController::class)->group(function () {
        Route::get('category/all', 'index');
        Route::get('category/{id}', 'show');

        Route::middleware('auth:sanctum')->group(function () {
            Route::post('category/store', 'store');
            Route::patch('category/update/{id}', 'update');
            Route::delete('category/delete/{id}', 'destroy');
        });
    });

    Route::controller(ProductController::class)->group(function () {
        Route::get('product/all', 'index');
        Route::get('product/limited', 'limitedProducts');
        Route::get('product/{id}', 'show');

        Route::middleware('auth:sanctum')->group(function () {
            Route::post('product/store', 'store');
            Route::patch('product/update/{id}', 'update');
            Route::delete('product/delete/{id}', 'destroy');
        });

    });

    Route::controller(WishlistController::class)->middleware('auth:sanctum')->group(function () {
        Route::get('wishlist/all', 'index');
        Route::post('wishlist/store', 'store');
        Route::delete('wishlist/delete/{id}', 'destroy');
    });

    Route::controller(CartController::class)->middleware('auth:sanctum')->group(function () {
        Route::get('cart/all', 'index');
        Route::post('cart/store', 'store');
        Route::delete('cart/delete/{id}', 'destroy');
    });


//});
