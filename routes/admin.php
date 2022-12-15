<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\Admin\BlankController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Setting\AppDbBackupController;
use App\Http\Controllers\Setting\Permission\RoleController;
use App\Http\Controllers\Setting\Permission\PermissionController;

Route::resource('blank', BlankController::class)->except(['store','edit', 'update','delete']);

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');


// Global Ajax Route
Route::delete('delete-all/{model}', [AjaxController::class, 'deleteAll'])->name('delete_all');
Route::delete('force-delete-all/{model}', [AjaxController::class, 'forceDeleteAll'])->name('force_delete_all');
Route::get('select-2-ajax/{model}', [AjaxController::class, 'select2'])->name('select2');

// Role & Permission
Route::post('role/permission/{role}', [RoleController::class, 'assignPermission'])->name('role.permission');
Route::resource('role', RoleController::class);
Route::resource('permission', PermissionController::class);

// App DB Backup
Route::get('app-db/password', [AppDbBackupController::class, 'password'])->name('backup.password');
Route::post('app-db/checkPassword', [AppDbBackupController::class, 'checkPassword'])->name('backup.checkPassword');
Route::get('app-db/confirm', [AppDbBackupController::class, 'index'])->name('backup.index');

Route::post('backup-file', [AppDbBackupController::class, 'backupFiles'])->name('backup.files');
Route::post('backup-db', [AppDbBackupController::class, 'backupDb'])->name('backup.db');

// Route::get('app-db/restore', [AppDbBackupController::class, 'restoreLoad'])->name('backup.restore');
// Route::post('app-db/restore/post', [AppDbBackupController::class, 'restore'])->name('backup.restore.post');

Route::post('/backup-download/{name}/{ext}', [AppDbBackupController::class, 'downloadBackup'])->name('backup.download');
Route::post('/backup-delete/{name}/{ext}', [AppDbBackupController::class, 'deleteBackup'])->name('backup.delete');
