<?php

use App\Http\Controllers\WorkShop\Auth\AuthController;
use App\Http\Controllers\WorkShop\Auth\StoreController;
use App\Http\Controllers\WorkShop\Dashboard\DashboardController;
use App\Http\Controllers\WorkShop\User\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

// Route::group(['namespace' => 'Auth', 'prefix' => 'auth'], function(){
//     // Route::post('/register', [RegisterController::class, 'create']);
//     Route::post('/register', [StoreController::class, 'store']);

// });

Route::group(['middleware' => 'api', 'prefix' => 'auth'], function ($router) {
    Route::post('/register', [StoreController::class, 'store']);

    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);

    Route::group(['middleware' => 'jwt.auth'], function ($router) {
        Route::get('dashboard', DashboardController::class);
        Route::get('users', UserController::class);

    });

});

