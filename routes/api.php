<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;

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


Route::get('/products', [\App\Http\Controllers\ProductController::class, 'index']);
Route::get('/products/{product}', [\App\Http\Controllers\ProductController::class, 'show']);
Route::POST('/products', [\App\Http\Controllers\ProductController::class, 'store']);
Route::PUT('/products/{product}', [\App\Http\Controllers\ProductController::class, 'update']);
Route::DELETE('/products/{product}', [\App\Http\Controllers\ProductController::class, 'destroy']);

Route::group(['prefix'=>'products'], function(){
    Route::get('/{product}/reviews', [\App\Http\Controllers\ReviewController::class, 'index']);
});

