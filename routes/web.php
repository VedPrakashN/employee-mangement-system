<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\EmpprofileController;



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [FrontendController::class, 'index']);

Route::prefix('/employee')->middleware(['auth','role:employee'])->group(function () {

    Route::get('profile', [EmpprofileController::class, 'index']);
    Route::put('profile-update', [EmpprofileController::class, 'profileupdate']);

});

Route::prefix('/admin')->middleware(['auth', 'isAdmin', 'role:admin'])->group(function () {

    Route::get('dashboard', [DashboardController::class, 'index']);

    Route::get('view-employee', [EmployeeController::class, 'index']);
    Route::get('add-employee', [EmployeeController::class, 'create']);
    Route::post('employee-store', [EmployeeController::class, 'store']);
    Route::get('edit-employee/{id}', [EmployeeController::class, 'edit']);
    Route::post('employee-update/{id}', [EmployeeController::class, 'update']);
    Route::get('delete-employee/{id}', [EmployeeController::class, 'destroy']);

    Route::post('add-emp-experience/{id}', [EmployeeController::class, 'addexperience']);
    Route::post('add-emp-qualification/{id}', [EmployeeController::class, 'addqualification']);
    Route::post('add-emp-familymember/{id}', [EmployeeController::class, 'addfamilymember']);

    Route::get('experince-delete/{id}/{emp_id}', [EmployeeController::class, 'deleteexperience']);
    Route::get('qualification-delete/{id}/{emp_id}', [EmployeeController::class, 'deletequalification']);
    Route::get('familymember-delete/{id}/{emp_id}', [EmployeeController::class, 'deletefamilymember']);


    Route::post('importExcel', [EmployeeController::class, 'importEmployee'])->name('importExcel');
    Route::get('exportExcel/{type}', [EmployeeController::class, 'exportExcel'])->name('exportExcel');
    Route::get('view-employee/{id}', [EmployeeController::class, 'viewBiodata']);
    Route::get('generate-employee-pdf/{id}', [EmployeeController::class, 'biodataPDFdownload']);

    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    // Route::resource('permissions', PermissionController::class);

});

