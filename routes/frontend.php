<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CartController;
use App\Http\Controllers\Frontend\IndexController;

Route::get('/', [IndexController::class, 'index'])->name('index');
Route::post('/cart', [CartController::class, 'store'])->name('cart.store');
Route::get('/cart/show', [CartController::class, 'show'])->name('cart.show');
Route::delete('/cart/destroy', [CartController::class, 'destroy'])->name('cart.destroy');
