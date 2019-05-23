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

Route::get('/', function () {
    return redirect()->route('login');
});

// Admin Dashboard
Route::get('/admin', 'UsersController@adminHome');

// Kuhinja Dashboard
Route::get('/kuhinja', 'UsersController@kuhinjaHome');

// Magacin Dashboard
Route::get('/magacin', 'UsersController@magacinHome');

// Prodaja Dashboard
Route::get('/prodaja', 'UsersController@prodajaHome');

// Vozac Dashboard
Route::get('/vozac', 'UsersController@vozacHome');

// Prikaz svih korisnika
Route::get('/prikaz-korisnika', 'UsersController@prikaz_korisnika');

// Kontakt strana
Route::get('/contact', 'ContactController@index');
