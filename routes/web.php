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
Route::get('/admin', 'UsersController@adminHome')->middleware('role:admin');

// Kuhinja Dashboard
Route::get('/kuhinja', 'UsersController@kuhinjaHome')->middleware('role:kuhinja');

// Magacin Dashboard
Route::get('/magacin', 'UsersController@magacinHome')->middleware('role:magacin');

// Prodaja Dashboard
Route::get('/prodaja', 'UsersController@prodajaHome')->middleware('role:prodaja');

// Vozac Dashboard
Route::get('/vozac', 'UsersController@vozacHome')->middleware('role:vozac');

// Prikaz svih korisnika
Route::get('/prikaz-korisnika', 'UsersController@prikaz_korisnika')->middleware('role:admin');

// Prikaz i dodavanje klijenata
Route::group(['prefix'=>'klijenti'], function(){
    Route::get('/', 'KlijentiController@index');
    Route::get('/create', 'KlijentiController@create');
    Route::post('/store', 'KlijentiController@store');
});

Route::group(['prefix'=>'eventi'], function (){
    Route::get('/', 'EventController@index');
    Route::get('/create', 'EventController@create');
    Route::post('/store', 'EventController@store');
});

// Kontakt strana
Route::get('/contact', 'ContactController@index');


