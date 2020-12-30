<?php

use App\Http\Controllers\ImportCSVController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/read', [\App\Http\Controllers\ImportFileController::class, 'read']);
Route::get('/insert', [\App\Http\Controllers\ImportFileController::class, 'insert']);
Route::get('/test', [\App\test\Book::class, 'test']);
