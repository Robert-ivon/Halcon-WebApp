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

Route::middleware('auth')->group(function () {
    // Route for uploading a delivery photo for an order
    Route::post('/orders/{order}/upload-photo', [OrderController::class, 'uploadPhoto'])->name('orders.uploadPhoto');

    // Admin Dashboard Route
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    // Sales Dashboard Route
    Route::get('/sales/dashboard', [SalesController::class, 'index'])->name('sales.dashboard');
    
    // Purchasing Dashboard Route
    Route::get('/purchasing/dashboard', [PurchasingController::class, 'index'])->name('purchasing.dashboard');
    
    // Warehouse Dashboard Route
    Route::get('/warehouse/dashboard', [WarehouseController::class, 'index'])->name('warehouse.dashboard');
    
    // Route Dashboard Route
    Route::get('/route/dashboard', [RouteController::class, 'index'])->name('route.dashboard');
});

Route::middleware('auth')->get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Home route
Route::get('/', function () {
    return view('main.index');
})->name('home');

Route::get('/order-status', [OrderController::class, 'checkStatus'])->name('order.status');

Route::middleware(['auth', 'role:route'])->group(function () {
   
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

Route::middleware('auth', 'role:purchasing')->get('/purchasing/dashboard', [PurchasingController::class, 'index'])->name('purchasing.dashboard');
Route::middleware('auth', 'role:warehouse')->get('/warehouse/dashboard', [WarehouseController::class, 'index'])->name('warehouse.dashboard');
Route::middleware('auth', 'role:route')->get('/route/dashboard', [RouteController::class, 'index'])->name('route.dashboard');


});



