<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PageController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});
Route::group([
    'prefix' => 'page',
    'as' => 'page.',
], function () {
    Route::post('get', [PageController::class, 'get'])->name('get');
});

Route::get('/blocks/services/{url}', [PageController::class, 'getServiceBlockByUrl']);
Route::get('/blocks', [PageController::class, 'getAllBlocks']);

require __DIR__ . '/auth.php';
