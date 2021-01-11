<?php

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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});


Route::prefix('v1/xml')->group(function() {
    Route::post('/', "Api\XmlController@store")->middleware('auth:api');
});

Route::prefix('v1/auth')->group(function() {
    Route::post('/register', "Api\UserController@store");
    Route::post('/login', "Api\UserController@login");
});

Route::prefix('v1/orders')->group(function() {
    Route::get('/', "Api\OrderController@index")->middleware('auth:api');;
});

Route::prefix('v1/people')->group(function() {
    Route::get('/', "Api\PersonController@index")->middleware('auth:api');;
});

Route::prefix('v1/phones')->group(function() {
    Route::get('/', "Api\PhoneController@index")->middleware('auth:api');;
});

Route::prefix('v1/items')->group(function() {
    Route::get('/', "Api\ItemController@index")->middleware('auth:api');;
});

Route::prefix('v1/shiptos')->group(function() {
    Route::get('/', "Api\ShiptoController@index")->middleware('auth:api');;
});
