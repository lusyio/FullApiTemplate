<?php

use App\Http\Controllers\Api\AppController;
use App\Http\Controllers\Api\PageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ImageController;

Route::get('/images', [ImageController::class, 'index']);
Route::get('/get-app-data', [AppController::class, 'getAppData']);
Route::get('/blocks', [PageController::class, 'getAllBlocks']);
Route::post('/create-block', [PageController::class, 'createBlock']);
Route::post('/update-block/{id}', [PageController::class, 'updateBlock']);
Route::post('/create-content-element', [PageController::class, 'createContentElement']);
Route::post('/update-content-element/{id}', [PageController::class, 'updateContentElement']);
Route::get('/get-content-elements', [PageController::class, 'getContentElements']);

require __DIR__ . '/auth.php';
