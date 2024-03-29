<?php

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
	return view('folder/beranda/index');
})->name('beranda');

Route::group(['prefix'  => 'barang', 'as'=>'barang.'], function(){
	Route::get('/', array('uses' => 'C_barang@index', 'as' => 'index'));
    Route::get('/form', array('uses' => 'C_barang@get_form'));
    Route::get('/form/{id}', array('uses' => 'C_barang@get_form'));
});

Route::group(['prefix'  => 'users', 'as'=>'users.'], function(){
	Route::get('/', array('uses' => 'C_users@index', 'as' => 'index'));
    Route::get('/form', array('uses' => 'C_users@get_form'));
    Route::get('/form/{id}', array('uses' => 'C_users@get_form'));
});