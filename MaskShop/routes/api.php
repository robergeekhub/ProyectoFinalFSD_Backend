<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

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
    Route::get('/', function(){
    return response()->json(['message' => 'Running smoothly!'], 200);
});

    Route::apiResource('users', UserController::class)->middleware('auth:api');
    Route::post('register',[UserController::class,'store'])->name('register');
    Route::post('login',[UserController::class,'login'])->name('login'); 
    Route::get('logout',[UserController::class,'logout'])->name('logout')->middleware('auth:api'); 
    
    
    Route::get('/product/show',[ProductController::class,'indexAll']);
    Route::post('/product/add',[ProductController::class,'store']);
    Route::put('/product/{id}',[ProductController::class,'update']);
    Route::delete('/product/{id}',[ProductController::class,'destroy']);



