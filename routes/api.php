<?php

use App\Http\Controllers\CategoryController;
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
