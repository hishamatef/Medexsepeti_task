<?php

use Illuminate\Http\Request;
use Modules\Product\Http\Controllers\Api\ProductController;

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

Route::middleware('auth:sanctum')->get('/product', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'auth:sanctum'], function (){
    Route::Resource('products', ProductController::class);
});
