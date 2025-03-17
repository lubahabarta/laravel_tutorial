<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::view('/register', 'auth.register')->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    Route::view('/login', 'auth.login')->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');

    Route::view('/avatar', 'users.avatar')->name('avatar');
    Route::post('/avatar', [UserController::class, 'avatar'])->name('avatar.update');

    Route::view('/deposit', 'users.deposit')->name('deposit');
    Route::post('/deposit', [UserController::class, 'deposit'])->name('deposit.add');
});

// PRODUCTS
Route::resource('products', ProductController::class)->except(['index', 'show', 'edit']);
Route::get('/', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{slug}', [ProductController::class, 'show'])->name('products.show');
Route::get('/products/{slug}/edit', [ProductController::class, 'edit'])->name('products.edit');

// USERS
Route::get('/users/{username}', [UserController::class, 'show'])->name('users.show');
