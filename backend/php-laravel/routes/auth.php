<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => '/auth'], function () {

    Route::post('/sign-up-by-email', [AuthController::class, 'signUpByEmail']);
    Route::post('/sign-in-by-email', [AuthController::class, 'signInByEmail']);
    Route::post('/update-password', [AuthController::class, 'updatePassword']);
    Route::post('/sign-out', [AuthController::class, 'signOut']);
});

