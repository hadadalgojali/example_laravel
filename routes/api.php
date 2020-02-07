<?php

use Illuminate\Http\Request;

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

Route::group(['prefix'  => 'v1'], function(){
  // ================ API AUTH
  Route::post('/create/barang', [
    'uses'  => 'C_barang@create'
  ]);

  Route::post('/update/barang', [
    'uses'  => 'C_barang@update'
  ]);

  // ================ API AUTH
  Route::get('/data/barang', [
    'uses'  => 'C_barang@data'
  ]);
});