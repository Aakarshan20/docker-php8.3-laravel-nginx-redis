<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/auth/register', [AuthController::class, 'register']);
Route::get('/register2', [AuthController::class, 'register2']);
Route::post('/register3', [AuthController::class, 'register3']);
Route::post('/login', [AuthController::class, '']);


Route::get('/getCsrfToken', [AuthController::class, 'getCsrfToken']);

// 將需要帶 Token 才能使用的 API 放在下面的 Route::group
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/logout', [AuthController::class, 'logout']);
});
