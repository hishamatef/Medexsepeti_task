<?php

use Modules\Brand\Http\Controllers\BrandController;

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

//Route::prefix('brand')->group(function() {
//    Route::get('/', 'BrandController@index');
//});
Route::group(['middleware' => 'auth'], function () {
    Route::Resource('brands', BrandController::class);

});
