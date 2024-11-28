<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\PurchasingController;
use App\Http\Controllers\WarehouseController;
use App\Http\Controllers\RouteController;

// Public routes
Route::get('/', function () {
    return view('main.index');
})->name('home');

Route::get('/order-status', [OrderController::class, 'checkStatus'])->name('order.status');

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

// Routes for authenticated users
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Role-based dashboards
    Route::middleware('role:admin')->group(function () {
        Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    });

    Route::middleware('role:sales')->group(function () {
        Route::get('/sales/dashboard', [SalesController::class, 'index'])->name('sales.dashboard');
    });

    Route::middleware('role:purchasing')->group(function () {
        Route::get('/purchasing/dashboard', [PurchasingController::class, 'index'])->name('purchasing.dashboard');
    });

    Route::middleware('role:warehouse')->group(function () {
        Route::get('/warehouse/dashboard', [WarehouseController::class, 'index'])->name('warehouse.dashboard');
    });

    Route::middleware('role:route')->group(function () {
        Route::get('/route/dashboard', [RouteController::class, 'index'])->name('route.dashboard');
    });

    // Resource routes
    Route::resource('users', UserController::class)->middleware('role:admin');
    Route::resource('orders', OrderController::class);
    Route::resource('photos', PhotoController::class);
    Route::resource('roles', RoleController::class)->middleware('role:admin');
    Route::resource('departments', DepartmentController::class)->middleware('role:admin');

    // Upload photo for Route personnel
    Route::post('/orders/{order}/upload-photo', [OrderController::class, 'uploadPhoto'])->name('orders.uploadPhoto')->middleware('role:route');
});
