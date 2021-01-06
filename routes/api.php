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

Route::apiResource('users', UserController::class);

Route::post('/login', [\App\Http\Controllers\LoginController::class, 'login']);
Route::post('/register', [\App\Http\Controllers\LoginController::class, 'register']);


Route::get('/role', [\App\Http\Controllers\RoleController::class, 'role']);



Route::post('/read', [\App\Http\Controllers\ImportFileController::class, 'read']);
Route::post('/insert', [\App\Http\Controllers\ImportFileController::class, 'insert']);
