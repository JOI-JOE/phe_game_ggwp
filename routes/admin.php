<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminDashboard;
use App\Http\Controllers\admin\AdminLoginController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\TypeController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\VariantController;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


Route::group(['middleware' => 'admin.guest'], function () {
    Route::get('login', [AdminLoginController::class, 'index'])->name('admin.login');
    Route::post('authenticate', [AdminLoginController::class, 'authenticate'])->name('admin.authenticate');
});

Route::group(['middleware' => 'admin.auth'], function () {
    Route::get('/', [AdminDashboard::class, 'index'])->name('admin.dashboard');

    // Type
    Route::get('/list-type', [TypeController::class, 'index'])->name('admin.type');
    Route::get('type/create', [TypeController::class, 'create'])->name('type.create');
    Route::get('/type/{id}', [TypeController::class, 'show'])->name('type.show');
    Route::post('type', [TypeController::class, 'store'])->name('type.store');
    Route::get('type/edit/{id}', [TypeController::class, 'edit'])->name('type.edit');
    Route::put('type/update/{id}', [TypeController::class, 'update'])->name('type.update');
    Route::delete('type/{id}', [TypeController::class, 'destroy'])->name('type.destroy');

    // Product
    Route::prefix('products')->name('product.')->group(function () {
        // Route::get('/', [ProductController::class, 'index'])->name('product.list');
        Route::get('list', [ProductController::class, 'index'])->name('list');
        Route::get('create', [ProductController::class, 'create'])->name('create');
        Route::get('{id}', [ProductController::class, 'show'])->name('show');
        Route::delete('{id}', [ProductController::class, 'destroy'])->name('destroy');
        Route::get('edit/{id}', [ProductController::class, 'edit'])->name('edit');
        Route::put('update/{id}', [ProductController::class, 'update'])->name('update');
        Route::post('store', [ProductController::class, 'store'])->name('store');
    });

    Route::prefix('variants')->name('variant.')->group(function () {
        Route::get('list', [VariantController::class, 'index'])->name('list');
        Route::get('create', [VariantController::class, 'create'])->name('create');
        // Route::get('{id}', [ProductController::class, 'show'])->name('show');
        // Route::delete('{id}', [ProductController::class, 'destroy'])->name('destroy');
        // Route::get('edit/{id}', [ProductController::class, 'edit'])->name('edit');
        // Route::put('update/{id}', [ProductController::class, 'update'])->name('update');
        // Route::post('store', [ProductController::cnlass, 'store'])->name('store');
    });

    Route::prefix('user')->name('user.')->group(function () {
        Route::get('list', [UserController::class, 'index'])->name('index');
        Route::get('create', [UserController::class, 'create'])->name('create');
        Route::get('edit/{id}', [UserController::class, 'edit'])->name('edit');
        Route::put('update/{id}', [UserController::class, 'update'])->name('update');
        // Route::get('{id}', [ProductController::class, 'show'])->name('show');
        // Route::delete('{id}', [ProductController::class, 'destroy'])->name('destroy');
        // Route::post('store', [ProductController::cnlass, 'store'])->name('store');
    });


    Route::get('getSlug', function (Request $request) {
        $handle = '';
        if ($request->title) {
            $handle = Str::slug($request->title);
        }
        return response()->json([
            'status' => true,
            'handle' => $handle
        ]);
    })->name('getSlug');


    Route::post('/tmp-upload', [ProductController::class, 'tmpUpload'])->name('upload_image');
    Route::delete('/tmp-delete', [ProductController::class, 'tmpDelete'])->name('delete_image');
});
