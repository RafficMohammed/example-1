<?php

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

Route::get('/tree',[\App\Http\Controllers\CategoryController::class,'index']);

Route::get('/category',[\App\Http\Controllers\DeviceController::class,'index']);
Route::post('store',[\App\Http\Controllers\CategoryController::class,'store']);


Route::get('device',[\App\Http\Controllers\DeviceController::class,'index']);
