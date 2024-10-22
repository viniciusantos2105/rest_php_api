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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('user')->group(function () {
    Route::get('/{userId}', [UserController::class, 'getUser']);
    Route::post('/create', [UserController::class, 'createUser']);
    Route::put('/update/{userId}', [UserController::class, 'updateUser']);
    Route::delete('/delete/{userId}', [UserController::class, 'deleteUser']);
});
