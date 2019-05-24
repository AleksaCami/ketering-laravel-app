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
// Editovanje korisnika
Route::get('/korisnici/edit/{id}', 'UsersController@edit')->middleware('role:admin');
Route::put('/korisnici/update/{id}', 'UsersController@update')->middleware('role:admin');


// Prikaz i dodavanje klijenata
Route::group(['prefix'=>'klijenti', 'middleware' => 'role:admin|prodaja'], function(){
    Route::get('/', 'KlijentiController@index');
    Route::get('/create', 'KlijentiController@create');
    Route::post('/store', 'KlijentiController@store');
    Route::get('/edit/{id}', 'KlijentiController@edit');
    Route::put('/update/{id}', 'KlijentiController@update');
    Route::delete('/destroy/{id}', 'KlijentiController@destroy');
});

// Prikaz i dodavanje evenata
Route::group(['prefix'=>'eventi', 'middleware' => 'role:admin|prodaja'], function (){
    Route::get('/', 'EventController@index');
    Route::get('/create', 'EventController@create');
    Route::post('/store', 'EventController@store');
    Route::get('/edit/{id}', 'EventController@edit');
    Route::put('/update/{id}', 'EventController@update');
    Route::delete('/destroy/{id}', 'EventController@destroy');
});

// Prikaz, dodavanje, editovanje i brisanje magacina
Route::group(['prefix'=>'magacini', 'middleware' => 'role:admin|prodaja'], function (){
    Route::get('/', 'MagacinController@index');
    Route::get('/create', 'MagacinController@create');
    Route::post('/store', 'MagacinController@store');
    Route::get('/edit/{id}', 'MagacinController@edit');
    Route::put('/update/{id}', 'MagacinController@update');
    Route::delete('/destroy/{id}', 'MagacinController@destroy');
});

// Prikaz, dodavanje, editovanje i brisanje proizvoda
Route::group(['prefix'=>'products', 'middleware' => 'role:admin|prodaja'], function (){
    Route::get('/', 'ProductsController@index');
    Route::get('/create', 'ProductsController@create');
    Route::post('/store', 'ProductsController@store');
    Route::get('/edit/{id}', 'ProductsController@edit');
    Route::put('/update/{id}', 'ProductsController@update');
    Route::delete('/destroy/{id}', 'ProductsController@destroy');
});

// Kontakt strana
Route::get('/contact', 'ContactController@index');


