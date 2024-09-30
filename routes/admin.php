<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminDashboard;
use App\Http\Controllers\admin\AdminLoginController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\TemporaryController;
use App\Http\Controllers\admin\TypeController;
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
    Route::prefix('products')->group(function () {
        // Route::get('/', [ProductController::class, 'index'])->name('product.list');
        Route::get('create', [ProductController::class, 'create'])->name('product.create');
        Route::post('store', [ProductController::class, 'store'])->name('product.store');
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
