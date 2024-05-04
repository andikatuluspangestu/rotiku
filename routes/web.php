<?php

use Illuminate\Support\Facades\Route;

// Admin Controllers
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminOrderController;

// Operator Controllers
use App\Http\Controllers\Operator\OperatorController;
use App\Http\Controllers\Operator\OperatorProductController;
use App\Http\Controllers\Operator\OperatorCategoryController;

// User Controllers
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\UserProductController;
use App\Http\Controllers\User\UserOrderController;


Route::get('/', function () {
    return view('welcome');
});

// Admin Route
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::resource('categories', AdminCategoryController::class);
    Route::resource('products', AdminProductController::class);
    Route::resource('orders', AdminOrderController::class);

    // Confirm Payment
    Route::patch('/orders/{order}/confirm-payment', [AdminOrderController::class, 'confirmPayment'])->name('orders.confirmPayment');

});

// Operator Route
Route::middleware(['auth', 'role:operator'])->prefix('operator')->name('operator.')->group(function () {
    Route::get('/dashboard', [OperatorController::class, 'index'])->name('dashboard');
    Route::resource('categories', OperatorCategoryController::class);
    Route::resource('products', OperatorProductController::class);
});

// User Route
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/user/dashboard', [UserController::class, 'index'])->name('user.dashboard');

    Route::get('/user/products', [UserProductController::class, 'index'])->name('user.products.index');
    Route::get('/user/products/{product}', [UserProductController::class, 'show'])->name('user.products.show');

    // Order Resource
    Route::resource('user.orders', UserOrderController::class);

    // Order Payment
    Route::get('/user/orders/{order}/payment', [UserOrderController::class, 'payment'])->name('user.orders.payment');

    // Completed Order
    Route::get('/user/orders/{order}/completed', [UserOrderController::class, 'completed'])->name('user.orders.completed');

    // updateAccepted
    Route::get('/user/orders/{order}/updateAccepted', [UserOrderController::class, 'updateAccepted'])->name('user.orders.updateAccepted');

});

require __DIR__ . '/auth.php';
