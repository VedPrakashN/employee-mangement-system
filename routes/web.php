<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Frontend\FrontendController;



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [FrontendController::class, 'index']);



Route::prefix('/admin')->middleware(['auth', 'isAdmin', 'role:admin'])->group(function () {

    Route::get('dashboard', [DashboardController::class, 'index']);

    Route::get('add-employee', [EmployeeController::class, 'index']);
    Route::post('employee-store', [EmployeeController::class, 'store']);

    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    // Route::resource('permissions', PermissionController::class);

});

