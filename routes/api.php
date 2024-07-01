<?php

use App\Http\Controllers\Api\V1\{
    AuthController,
    DashboardController,
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


Route::post('/v1/auth/login', [AuthController::class, 'login']);
Route::post('/v1/auth/refreshToken', [AuthController::class, 'refreshToken']);
Route::post('/v1/auth/logout', [AuthController::class, 'logout']);




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
