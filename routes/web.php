<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UnitPerPackController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});



Route::get('login',[AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('login',[AuthController::class, 'authUser'])->name('auth_user')->middleware('guest');
Route::post('logout',[AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');
    
    Route::resource('products', ProductController::class);
    Route::resource('unit_per_packs', UnitPerPackController::class);

});




