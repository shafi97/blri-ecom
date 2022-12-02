<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\Admin\BlankController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Permission\PermissionController;
use App\Http\Controllers\Permission\RoleController;

Route::resource('blank', BlankController::class)->except(['store','edit', 'update','delete']);

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// Global Ajax Route
Route::delete('delete-all/{model}', [AjaxController::class, 'deleteAll'])->name('delete_all');
Route::delete('force-delete-all/{model}', [AjaxController::class, 'forceDeleteAll'])->name('force_delete_all');
Route::get('select-2-ajax/{model}', [AjaxController::class, 'select2'])->name('select2');

// Session Route
Route::post('role/permission/{role}', [RoleController::class, 'assignPermission'])->name('role.permission');
Route::resource('role', RoleController::class);
Route::resource('permission', PermissionController::class);
