<?php

use App\Http\Controllers\Api\V1\{
    AuthController,
    DashboardController,
    LocationController,
    UserCatalogueController,
    UserController
};
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// AUTH ROUTE
Route::prefix('v1/auth')->group(function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('refreshToken', [AuthController::class, 'refreshToken']);
    Route::post('logout', [AuthController::class, 'logout']);
});

// LOCATION ROUTE
Route::prefix('v1/location')->group(function () {
    Route::get('provinces', [LocationController::class, 'getProvinces']);
    Route::get('getLocation', [LocationController::class, 'getLocation']);
});


Route::group(['middleware' => 'jwt.verify'], function () {

    // Routes for dashboard
    Route::prefix('v1/dashboard')->name('dashboard.')->group(function () {
        Route::put('changeStatus', [DashboardController::class, 'changeStatus'])->name('changeStatus');
        Route::put('changeStatusMultiple', [DashboardController::class, 'changeStatusMultiple'])->name('changeStatusMultiple');
        Route::delete('deleteMultiple', [DashboardController::class, 'deleteMultiple'])->name('deleteMultiple');
    });


    Route::prefix('v1/users')->group(function () {
        Route::apiResource('/', UserController::class);
        Route::apiResource('catalogues', UserCatalogueController::class);
    });
});
