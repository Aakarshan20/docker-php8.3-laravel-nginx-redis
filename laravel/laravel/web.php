<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/register', [AuthController::class, 'register']);
Route::get('/register-2', [AuthController::class, 'register-2']);
Route::post('/login', [AuthController::class, 'login']);

// 將需要帶 Token 才能使用的 API 放在下面的 Route::group
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/logout', [AuthController::class, 'logout']);
});
