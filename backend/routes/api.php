<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\AdminRegisterController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/user/login', [LoginController::class, 'login']);

Route::post('/user/register', [RegisterController::class, 'register']);

Route::post('/logout', [LoginController::class, 'logout']);

Route::post('/admin/login', [AdminLoginController::class, 'login']);

Route::post('/admin/register', [AdminRegisterController::class, 'register']);