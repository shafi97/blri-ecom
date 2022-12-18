<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\IndexController;

Route::get('/', [IndexController::class, 'index'])->name('index');
