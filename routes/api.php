<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

Route::group(['prefix' => 'v1'], function () {
    Route::prefix('auth')->controller(LoginController::class)->group(function () {
        Route::post('/login', 'login')->name('auth.login');
        Route::post('/register', 'register')->name('auth.register');
    });
    Route::get('/ping', function () {
        return response()->json([
            'success' => true,
            'message' => 'API is working!',
        ]);
    });

    Route::group(['middleware' => ['auth:sanctum']], function () {

        Route::prefix('auth')->controller(LoginController::class)->group(function () {
            Route::post('/logout', 'logout')->name('auth.logout');
        });

        // Route::prefix('users')->controller(UserController::class)->group(function () {
        //     Route::group(['middleware' => ['role_or_permission:super-admin|' . User::LIST_USER]], function () {
        //         Route::get('', 'listUser')->name('users.listUser');
        //     });
        // });
    });
});
