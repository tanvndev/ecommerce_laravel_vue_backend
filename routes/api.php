<?php

use App\Http\Controllers\Api\V1\{
    AuthController,
    DashboardController
};
use Illuminate\Http\Request;
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



// Routes for Languages
Route::prefix('/v1/dashboard')->middleware('jwt.verify')->name('dashboard.')->group(function () {
    Route::get('getSidebar', [DashboardController::class, 'getSidebar'])->name('getSidebar');
});
