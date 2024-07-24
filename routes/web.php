<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\ListingController;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'index']);
Route::get('/hello', [IndexController::class, 'show']);

Route::resource('listing', ListingController::class);

Route::get('login/create', [\App\Http\Controllers\AuthController::class, 'create'])
    ->name('login');
Route::post('login', [\App\Http\Controllers\AuthController::class, 'store'])
    ->name('login.store');
Route::delete('logout', [\App\Http\Controllers\AuthController::class, 'destroy'])
    ->name('logout');
