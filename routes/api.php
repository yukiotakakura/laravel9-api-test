<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// User routes
Route::resource('users', UserController::class)->only([
    'store',
]);

Route::middleware('auth:sanctum')->group(function () {
    Route::resource('users', UserController::class)->only([
        'show'
    ]);
    // Route::resource('users', UserController::class)->only([
    //     'show', 'update', 'destroy',
    // ]);
});
