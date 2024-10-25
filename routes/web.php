<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\DepartmentController;

// Home route
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Resource routes for Users
Route::resource('users', UserController::class);

// Resource routes for Orders
Route::resource('orders', OrderController::class);

// Resource routes for Photos
Route::resource('photos', PhotoController::class);

// Resource routes for Roles
Route::resource('roles', RoleController::class);

// Resource routes for Departments
Route::resource('departments', DepartmentController::class);

