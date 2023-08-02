<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\VehiclesController;
use App\Http\Controllers\VendorsController;
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

// Authentication
Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'loginUser'])->name('loginUser');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

//Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    // Vendors
    Route::prefix('vendors')->group(function () {
        Route::get('/', [VendorsController::class, 'index'])->name('vendors');
        Route::get('/listing', [VendorsController::class, 'listing']);
        Route::get('/{id}', [VendorsController::class, 'details']);
    });

    // Vehicles
    Route::prefix('vehicles')->group(function () {
        Route::get('/', [VehiclesController::class, 'index'])->name('vehicles');
    });

    // Dashboard
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
});
