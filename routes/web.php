<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\ActivityLogController;
use App\Http\Controllers\Auth\VerificationController;
Route::get('/', function () {
    return redirect()->route('login');
})->name('home');

Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])
     ->name('verification.verify'); 
Route::middleware(['auth', 'verified', 'checkUserStatus'])->group(function () {
 Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

 Route::resource('users', UserController::class);
 Route::resource('products', ProductController::class);
 Route::post('change-product-status', [ProductController::class, 'changeStatus'])->name('change-product-status');
 
 Route::resource('purchase', PurchaseController::class);
 Route::get('product-data', [ProductController::class, 'getData'])->name('product.data');
 Route::get('edit-product/{id}', [ProductController::class, 'editProduct'])->name('edit-product');
 
 
 
 // Sales Routes
 Route::resource('sales', SaleController::class);
 Route::get('sale-data', [SaleController::class, 'getData'])->name('sale.data');
 
 
 Route::resource('activity-log', ActivityLogController::class);



 Route::post('change-status', [UserController::class, 'changeStatus'])->name('change-status');
 Route::get('user-role/{id}', [UserController::class, 'userRole'])->name('user-role');
 Route::get('remove-user-role/{id}', [UserController::class, 'showRemoveUserRole'])->name('remove-user-role');
 Route::post('set-permission', [UserController::class, 'setPermission'])->name('set-permission');
 Route::post('remove-permission', [UserController::class, 'removePermission'])->name('remove-permission');

 Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
