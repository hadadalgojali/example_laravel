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

Route::group(['prefix'  => 'v1', 'as'=>'v1.'], function(){
  // ================ API AUTH
  Route::post('/create/barang', [
    'uses'  => 'C_barang@create'
  ]);

  Route::post('/update/barang', [
    'uses'  => 'C_barang@update'
  ]);


  Route::post('/delete/barang', [
    'uses'  => 'C_barang@delete'
  ]);

  // ================ API AUTH
  Route::get('/data/barang', [
    'uses'  => 'C_barang@data'
  ]);

  Route::group(['prefix'  => 'users', 'as'=>'users.'], function(){
    Route::get('/data', [
      'uses'  => 'C_users@data'
    ]);

    Route::post('/create', [
      'uses'  => 'C_users@create'
    ]);

    Route::post('/update', [
      'uses'  => 'C_users@update'
    ]);

    Route::post('/delete', [
      'uses'  => 'C_users@delete'
    ]);

  });
});