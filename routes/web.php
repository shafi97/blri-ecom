<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\AuthController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/frontend/logout', [AuthController::class, 'logout'])->name('frontend.logout');
Route::get('/', [IndexController::class, 'index'])->name('index');

Route::controller(ProductController::class)->prefix('product')->group(function(){
    Route::get('/show/{product_uuid}', 'show')->name('product.show');
    Route::get('/by-category/{cat_uuid}', 'productByCat')->name('productByCat');
    Route::get('/by-sub-category/{sub_cat_uuid}', 'productBySubCat')->name('productBySubCat');
});





