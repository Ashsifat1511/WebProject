<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthManager;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\SellController;
use App\Http\Controllers\UpdateDueController;

Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::get('/login', [AuthManager::class, 'login'])->name('login');
Route::post('/login', [AuthManager::class, 'loginPost'])->name('login.post');
Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/items', [ItemController::class, 'items'])->name('items');
    Route::get('/customers', [CustomerController::class, 'customers'])->name('customers');
    Route::get('/sells', [SellController::class, 'sells'])->name('sells');
    Route::get('/rentals', [RentalController::class, 'rentals'])->name('rentals');
    Route::get('/update-due', [UpdateDueController::class, 'updateDue'])->name('update-due');
    Route::get('/accounts', [AccountController::class, 'accounts'])->name('accounts');
    Route::get('/admin', [AdminController::class, 'admin'])->name('admin');
});
Route::get('/register', [AuthManager::class, 'register'])->name('register');
Route::post('/register', [AuthManager::class, 'registerPost'])->name('register.post');
Route::get('/logout', [AuthManager::class, 'logout'])->name('logout');
