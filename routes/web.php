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
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\CartController;

Route::get('/', [AuthManager::class, 'login'])->name('login');
Route::post('/', [AuthManager::class, 'loginPost'])->name('login.post');
Route::get('/register', [AuthManager::class, 'register'])->name('register');
Route::post('/register', [AuthManager::class, 'registerPost'])->name('register.post');
Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


    //all routes for home
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/gaming', [HomeController::class, 'gaming'])->name('gaming');
    Route::get('/electronics', [HomeController::class, 'electronics'])->name('electronics');
    Route::get('/others', [HomeController::class, 'others'])->name('others');
    Route::get('/search', [HomeController::class, 'search'])->name('home.search');



    //all routes for items
    Route::get('/items', [ItemController::class, 'index'])->name('items.index');
    Route::match(['get', 'post'], '/items/search', [ItemController::class, 'search'])->name('items.search');
    Route::get('/items/create', [ItemController::class, 'create'])->name('items.create');
    Route::post('/items', [ItemController::class, 'store'])->name('items.store');
    Route::get('/items/{id}/edit', [ItemController::class, 'edit'])->name('items.edit');
    Route::put('/items/{id}', [ItemController::class, 'update'])->name('items.update');
    Route::delete('/items/{id}', [ItemController::class, 'destroy'])->name('items.destroy');


    //all routes for customers
    Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');
    Route::get('/customers/search', [CustomerController::class, 'search'])->name('customers.search');
    Route::delete('/customers/{id}', [CustomerController::class, 'destroy'])->name('customers.destroy');

    //all routes for sells
    Route::get('/sells', [SellController::class, 'index'])->name('sells.index');


    //all routes for rentals
    Route::get('/rentals', [RentalController::class, 'index'])->name('rentals.index');
    

    

    //all routes for admin
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/sell-report', [AdminController::class, 'showSells'])->name('admin.sells');
    Route::get('/admin/rent-report', [AdminController::class, 'showRentals'])->name('admin.rentals');
    Route::get('/admin/show-employee', [AdminController::class, 'showUsers'])->name('admin.employee');
    Route::get('/admin/add-employee', [AdminController::class, 'addEmployee'])->name('admin.add-employee');
    Route::post('/admin/add-employee', [AdminController::class, 'storeEmployee'])->name('admin.add-employee.post');
    Route::delete('/admin/employee/{id}', [AdminController::class, 'destroy'])->name('employees.destroy');
    Route::get('/admin/rentals/export', [AdminController::class, 'exportRentals'])->name('rentals.export');
    Route::get('/admin/sales/export', [AdminController::class, 'exportSales'])->name('sales.export');
    Route::get('/admin/show-employee/{id}/edit', [AdminController::class, 'editEmployee'])->name('employees.edit');
    Route::put('/admin/show-employee/{id}', [AdminController::class, 'updateEmployee'])->name('employees.update');


    //all routes for profile
    Route::get('/profile', [ProfileController::class, 'index'])->name('users.profile');
    Route::post('/profile', [ProfileController::class, 'updateProfile'])->name('profiles.update');


    //all routes for stripe
    Route::post('/session', [StripeController::class, 'session'])->name('session');
    Route::get('/success', [StripeController::class, 'success'])->name('success');
    Route::get('/cancel', [StripeController::class, 'cancel'])->name('cancel');

    //all routes for cart
    Route::get('/cart', [CartController::class, 'cart'])->name('cart');
    Route::get('/add-to-cart/{id}', [CartController::class, 'addToCart'])->name('add_to_cart');
    Route::patch('/update-cart', [CartController::class, 'update'])->name('update_cart');
    Route::delete('/remove-from-cart', [CartController::class, 'remove'])->name('remove_from_cart');
});
Route::post('/logout', [AuthManager::class, 'logout'])->name('logout');
