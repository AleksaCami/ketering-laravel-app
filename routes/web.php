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


Auth::routes();

// Admin Dashboard
Route::get('/admin', 'Users\AdminController@index');

// Kuhinja Dashboard
Route::get('/kuhinja', 'Users\KuhinjaController@index');

// Magacin Dashboard
Route::get('/magacin', 'Users\MagacinController@index');

//Office administrator Dashboard
Route::get('/office', 'Users\OfficeController@index');

// Prodaja Dashboard
Route::get('/prodaja', 'Users\ProdajaController@index');

// Vozac Dashboard
Route::get('/vozac', 'Users\VozacController@index');

// Redirekcija na /login sa /
Route::get('/', function () {
    return redirect()->route('login');
});

// Kontakt strana
Route::get('/contact', 'Pages\ContactController@index');

