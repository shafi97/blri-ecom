<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\ShippingController;

Route::controller(CartController::class)->prefix('/cart')->group(function(){
    Route::get('/index', 'index')->name('cart.index');
    Route::post('/store', 'store')->name('cart.store');
    Route::get('/show', 'show')->name('cart.show');
    Route::post('/incrementStore', 'incrementStore')->name('cart.incrementStore');
    Route::post('/decrementStore', 'decrementStore')->name('cart.decrementStore');
    Route::get('/delete/{uuid}', 'delete')->name('cart.delete');
});


Route::delete('/cart/destroy', [CartController::class, 'destroy'])->name('cart.destroy');
Route::get('/shipping', [ShippingController::class, 'index'])->name('shipping.index');
Route::post('/shipping', [ShippingController::class, 'store'])->name('shipping.store');
Route::post('/confirm', [ShippingController::class, 'confirm'])->name('shipping.confirm');
