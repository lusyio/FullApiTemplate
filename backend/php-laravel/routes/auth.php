<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => '/auth'], function () {
    Route::group(['middleware' => ['guest']], function () {

        // Route::post('/reset-password-by-email', [NewPasswordController::class, 'store']);
    });
    Route::post('/sign-up-by-email', [AuthController::class, 'signUpByEmail']);
    Route::post('/sign-in-by-email', [AuthController::class, 'signInByEmail']);
    Route::post('/sign-out', [AuthController::class, 'signOut']);
});
