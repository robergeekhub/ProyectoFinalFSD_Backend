<?php

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('users', UserController::class)->middleware('auth:api');
Route::post('register',[UserController::class,'store']); 
Route::post('login',[UserController::class,'login'])->name('login'); 
Route::get('logout',[UserController::class,'logout'])->name('logout')->middleware('auth:api'); 

Route::apiResource('products',ProductController::class)->middleware('auth:api');
Route::get('getAll',[ProductController::class,'getAll']);
Route::get('getId/{id}',[ProductController::class,'getId']);
Route::get('getName/{name}',[ProductController::class,'getName']);
Route::get('getPriceUpward',[ProductController::class,'getPriceUpward']);
Route::get('getPriceAscendent',[ProductController::class,'getPriceAscendent']);

Route::apiResource('users', UserController::class)->middleware('auth:api');


