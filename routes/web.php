<?php

use App\Http\Controllers\GoogleAuthController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

Route::get('/', function () {
    return ['Laravel' => app()->version()];
});


Route::get('auth/google/redirect', [GoogleAuthController::class, 'redirect']);

Route::get('/auth/google/callback', [GoogleAuthController::class, 'callback']);

require __DIR__.'/auth.php';

