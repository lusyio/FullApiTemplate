<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PageController;


Route::get('/blocks', [PageController::class, 'getAllBlocks']);

require __DIR__ . '/auth.php';
