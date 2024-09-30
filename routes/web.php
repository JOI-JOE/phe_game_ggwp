<?php

use App\Http\Controllers\client\HomeController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('pages/lien-he', [HomeController::class, 'contact'])->name('contact');
Route::get('collections/all', [HomeController::class, 'products'])->name('products');
Route::get('account/login', action: [HomeController::class, 'login'])->name('login');
Route::get('account/register', action: [HomeController::class, 'register'])->name('register');
Route::get('products/{handle}', action: [HomeController::class, 'detail_product'])->name('detai_product');
Route::get('cart', action: [HomeController::class, 'cart'])->name('cart');
Route::get('search', action: [HomeController::class, 'search'])->name('search');
