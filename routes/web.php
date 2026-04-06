<?php

use Illuminate\Support\Facades\Route;
// 1. Perbaikan backslash pada namespace controller
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;

// Halaman Utama
Route::get('/', function () {
    return view('index');
})->name('home');

// Halaman Login (Menampilkan Form)
// Pastikan di AuthController ada function bernama showLogin
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');

// Proses Form Login
// 2. Samakan name-nya menjadi 'login.process' agar terbaca oleh <form action="{{ route('login.process') }}">
Route::post('/login', [AuthController::class, 'login'])->name('login.process');

// Logout
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// route halaman produk
Route::get('/products', [ProductController::class, 'index'])->name('products');
// # Code Route untuk Menambah Product Baru
Route::post('/products', [App\Http\Controllers\ProductController::class, 'store'])->name('products.store');