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


    //all routes for items
    Route::get('/items', [ItemController::class, 'index'])->name('items.index');
    Route::get('/items/search', [ItemController::class, 'search'])->name('items.search');
    Route::get('/items/create', [ItemController::class, 'create'])->name('items.create');
    Route::post('/items', [ItemController::class, 'store'])->name('items.store');
    Route::get('/items/{id}/edit', [ItemController::class, 'edit'])->name('items.edit');
    Route::put('/items/{id}', [ItemController::class, 'update'])->name('items.update');
    Route::delete('/items/{id}', [ItemController::class, 'destroy'])->name('items.destroy');


    //all routes for customers
    Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');
    Route::get('/customers/search', [CustomerController::class, 'search'])->name('customers.search');
    Route::get('/customers/create', [CustomerController::class, 'create'])->name('customers.create');
    Route::post('/customers', [CustomerController::class, 'store'])->name('customers.store');
    Route::get('/customers/{id}/edit', [CustomerController::class, 'edit'])->name('customers.edit');
    Route::put('/customers/{id}', [CustomerController::class, 'update'])->name('customers.update');
    Route::delete('/customers/{id}', [CustomerController::class, 'destroy'])->name('customers.destroy');

    //all routes for sells
    Route::get('/sells', [SellController::class, 'index'])->name('sells.index');
    Route::get('/sells/create', [SellController::class, 'create'])->name('sells.create');
    Route::post('/sells', [SellController::class, 'store'])->name('sells.store');



    Route::get('/rentals', [RentalController::class, 'index'])->name('rentals');
    Route::get('/update-due', [UpdateDueController::class, 'index'])->name('update-due');
    Route::get('/accounts', [AccountController::class, 'index'])->name('accounts');
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
});
Route::get('/register', [AuthManager::class, 'register'])->name('register');
Route::post('/register', [AuthManager::class, 'registerPost'])->name('register.post');
Route::get('/logout', [AuthManager::class, 'logout'])->name('logout');
