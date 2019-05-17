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
    return view('home');
})->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin', 'AdminController@index');
Route::get('/prodaja', 'ProdajaController@index');
Route::get('/kuhinja', 'KuhinjaController@index');
Route::get('/magacin', 'MagacinController@index');
Route::get('/vozac', 'VozacController@index');
Route::get('/office', 'OfficeController@index');
Route::get('/kontakt', 'ContactController@index');
