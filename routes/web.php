<?php

use App\Http\Controllers\client\CartController;
use App\Http\Controllers\client\DetailProduct;
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
// Detail - Product
Route::get('products/{handle}', action: [DetailProduct::class, 'show'])->name('detai_product');
// Cart
Route::get(uri: 'cart', action: [CartController::class, 'index'])->name('cart.index');
Route::post(uri: 'add-to-cart', action: [CartController::class, 'addToCart'])->name('addToCart');
Route::get('get-total-cart', [CartController::class, 'updateTotal'])->name('getTotal');

// Search - Function
Route::get('search', action: [HomeController::class, 'search'])->name('search');
