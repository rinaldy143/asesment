<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Booking\BookingController;
use App\Http\Controllers\Event\EventController;
use App\Http\Controllers\Payment\PaymentController;
use App\Http\Controllers\Ticket\TicketController;

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
            Route::get('/me', 'me')->name('auth.me');
            Route::post('/logout', 'logout')->name('auth.logout');
        });

        Route::prefix('users')->controller(UserController::class)->group(function () {
            // Route::group(['middleware' => ['role_or_permission:super-admin|' . User::LIST_USER]], function () {
                Route::get('', 'index')->name('users.index');
                Route::post('', 'store')->name('users.store');
                Route::get('/{id}', 'show')->name('users.show');
                Route::put('/{id}', 'update')->name('users.update');
                Route::delete('/{id}', 'destroy')->name('users.destroy');
            // });
        });

        Route::prefix('events')->controller(EventController::class)->group(function () {
            Route::get('', 'index')->name('events.index');
            Route::post('', 'store')->name('events.store');
            Route::get('/{id}', 'show')->name('events.show');
            Route::put('/{id}', 'update')->name('events.update');
            Route::delete('/{id}', 'destroy')->name('events.destroy');


            Route::post('/{event}/tickets', [TicketController::class, 'store'])->name('tickets.store');
        });

        Route::prefix('tickets')->controller(TicketController::class)->group(function () {
            Route::put('/{id}', 'update')->name('tickets.update');
            Route::delete('/{id}', 'destroy')->name('tickets.destroy');


            Route::post('/{id}/bookings', [BookingController::class, 'store'])->name('bookings.store');
        });

        Route::prefix('bookings')->controller(BookingController::class)->group(function () {
            Route::get('', 'index')->name('bookings.index');
            Route::put('/{id}/payments', 'payment')->name('bookings.payment');
            Route::put('/{id}/cancel', 'update')->name('bookings.update');
        });

        Route::prefix('payments')->controller(PaymentController::class)->group(function () {
            Route::get('/{id}', 'show')->name('payments.show');
        });
    });
});
