<?php

use Illuminate\Support\Facades\Route;

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
    return view('home');
});

Route::get('/login', 'AuthController@login')->name('login');
Route::post('/postlogin', 'AuthController@postlogin');
Route::get('/logout', 'AuthController@logout');

Route::group(['middleware' => 'auth'], function(){
    Route::get('/dashboard', 'DashboardController@index');
    Route::get('/barang', 'BarangController@index');
    Route::post('/barang/create', 'BarangController@create');
    Route::get('/barang/{id}/edit', 'BarangController@edit');
    Route::post('/barang/{id}/update', 'BarangController@update');
    Route::get('/barang/{id}/delete', 'BarangController@delete');
});