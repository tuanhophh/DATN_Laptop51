<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\PassengerController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

//     Route::prefix('cars')->group(function(){
//         Route::get('/', [CarController::class,'index'])->name('car.index');
//     };
//     // Route::prefix('cars')->group(function () {
//     // Route::get('/{id}', [CarController::class, 'detail'])->name('cate.detail');

Route::prefix('users')->group(function(){
    Route::get('/', [UserController::class,'index'])->name('user.index');
    Route::get('add',[UserController::class,'addForm'])->name('user.add');
    Route::post('add',[UserController::class,'saveAdd']);
})
?>