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

Route::group(['middleware' => 'admin'], function () {
    Route::get('/adminproducts', [UserController::class,'admin']);
    
});
Route::group(['middleware' => ['cors']], function () {
Route::apiResource('users', UserController::class)->middleware('auth:api');
Route::post('register',[UserController::class,'store']); 
Route::post('login',[UserController::class,'login'])->name('login'); 
Route::get('logout',[UserController::class,'logout'])->name('logout')->middleware('auth:api'); 

Route::apiResource('products',ProductController::class)->middleware('auth:api');
Route::get('getAll',[ProductController::class,'getAll']);
Route::get('getId/{id}',[ProductController::class,'getId']);
Route::get('getProductByName/{name}',[ProductController::class,'getProductByName']);
Route::get('getPriceUpward',[ProductController::class,'getPriceUpward']);
Route::get('getPriceAscendent',[ProductController::class,'getPriceAscendent']);
Route::post('/',[ProductController::class,'insert']);
Route::put('/id',[ProductController::class,'modify']);
Route::delete('/{id}',[ProductController::class,'delete']);

Route::get('/',[OrderController::class,'getAll']);
Route::get('/orderId',[OrderController::class,'getId']);
Route::post('/',[OrderController::class,'insert']);
Route::put('/id',[OrderController::class,'modify']);
Route::delete('/id',[OrderController::class,'delete']);

});





