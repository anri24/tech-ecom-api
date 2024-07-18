<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WishlistController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(CategoryController::class)->group(function () {
    Route::get('category/all','index');
    Route::get('category/{id}','show');
    Route::post('category/store','store');
    Route::patch('category/update/{id}','update');
    Route::delete('category/delete/{id}','destroy');
});

Route::controller(ProductController::class)->group(function (){
    Route::get('product/all','index');
    Route::get('product/{id}','show');
    Route::post('product/store','store');
    Route::patch('product/update/{id}','update');
    Route::delete('product/delete/{id}','destroy');
});

Route::controller(WishlistController::class)->group(function () {
    Route::get('wishlist/all','index');
    Route::post('wishlist/store','store');
    Route::delete('wishlist/delete/{id}','destroy');
});
