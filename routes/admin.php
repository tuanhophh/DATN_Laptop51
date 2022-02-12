<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DetailProductController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('category')->group(function(){
    Route::get('/', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/remove/{id}', [CategoryController::class, 'remove'])->name('category.remove');
    Route::get('add',[CategoryController::class,'addForm'])->name('category.add');
    Route::post('add',[CategoryController::class,'saveAdd']);
    Route::get('edit/{id}',[CategoryController::class,'editForm'])->name('category.edit');
    Route::post('edit/{id}',[CategoryController::class,'saveEdit']);
    Route::get('detail/{id}', [CategoryController::class, 'detail']);
});
Route::prefix('product')->group(function(){
    Route::get('/', [ProductController::class, 'index'])->name('product.index');
    Route::get('/remove/{id}', [ProductController::class, 'remove'])->name('product.remove');
    Route::get('add',[ProductController::class,'addForm'])->name('product.add');
    Route::post('add',[ProductController::class,'saveAdd']);
    Route::get('edit/{id}',[ProductController::class,'editForm'])->name('product.edit');
    Route::post('edit/{id}',[ProductController::class,'saveEdit']);
    Route::get('detail/{id}', [ProductController::class, 'detail']);
});
Route::prefix('detail-product')->group(function(){
    Route::get('/', [DetailProductController::class, 'index'])->name('detail-product.index');
    Route::get('/remove/{id}', [DetailProductController::class, 'remove'])->name('detail-product.remove');
    Route::get('add',[DetailProductController::class,'addForm'])->name('detail-product.add');
    Route::post('add',[DetailProductController::class,'saveAdd']);
    Route::get('edit/{id}',[DetailProductController::class,'editForm'])->name('detail-product.edit');
    Route::post('edit/{id}',[DetailProductController::class,'saveEdit']);
    Route::get('detail/{id}', [DetailProductController::class, 'detail']);
});
