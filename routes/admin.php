<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BlankController;
use App\Http\Controllers\Admin\DashboardController;

Route::resource('blank', BlankController::class)->except(['store','edit', 'update','delete']);

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
