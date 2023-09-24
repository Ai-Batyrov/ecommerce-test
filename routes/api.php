<?php

use Ecommerce\Domains\Auth\Controllers\Controller as AuthController;
use Ecommerce\Domains\Order\Controllers\Controller as OrderController;
use Ecommerce\Domains\Product\Controllers\Controller as ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('register', [AuthController::class, 'register'])->name('register');
Route::post('login', [AuthController::class, 'login'])->name('login');

Route::middleware('auth:api')->group(function () {
    Route::prefix('products')->name('product-')->group(function () {
        Route::get('', [ProductController::class, 'index'])->name('index');
        Route::get('{product}', [ProductController::class, 'show'])->name('show');
        Route::post('', [ProductController::class, 'create'])->name('create');
        Route::put('{product}', [ProductController::class, 'update'])->name('update');
        Route::delete('{product}', [ProductController::class, 'delete'])->name('delete');
    });

    Route::prefix('orders')->name('order-')->group(function () {
        Route::get('', [OrderController::class, 'index'])->name('index');
        Route::get('{order}', [OrderController::class, 'show'])->name('show');
        Route::post('', [OrderController::class, 'create'])->name('crete');
        Route::put('{order}', [OrderController::class, 'update'])->name('update');
        Route::delete('{order}', [OrderController::class, 'delete'])->name('delete');
    });
});
