<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RayController;
use App\Http\Controllers\LendController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminHomeController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\UnitPerPackController;

Route::get('/', function () {
    return view('auth.login');
});



Route::get('login',[AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('login',[AuthController::class, 'authUser'])->name('auth_user')->middleware('guest');
Route::get('logout',[AuthController::class, 'logout'])->name('logout')->middleware('auth'); 

Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('dashboard', [AdminHomeController::class, 'index'])->name('dashboard');
    Route::get('dashboard/period/{period}', [AdminHomeController::class, 'recentSalesPerPeriod'])->name('dashboard.period');
    Route::get('dashboard/profile', [AdminHomeController::class,'profile'])->name('dashboard.profile');
    Route::post('dashboard/profile', [AdminHomeController::class,'updateProfile'])->name('dashboard.updateProfile');

    Route::resource('rays', RayController::class);
    Route::resource('products', ProductController::class);
    Route::resource('unit-per-packs', UnitPerPackController::class);
    
    Route::resource('stocks', StockController::class);
    Route::get('stock/sell', [StockController::class, 'createSell'])->name('stocks.sell');

    Route::resource('users', UserController::class);
    Route::resource('lends', LendController::class);
    Route::put('lends-state/{productLend}', [LendController::class, 'updateState'])->name('lends.state');


});




