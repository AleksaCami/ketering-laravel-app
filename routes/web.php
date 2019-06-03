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


// Prikaz, edit, delete svih korisnika
Route::group(['prefix' => 'korisnici', 'middleware' => 'role:admin'], function () {
    Route::get('/', 'UsersController@index');
    Route::get('/edit/{id}', 'UsersController@edit');
    Route::put('/update/{id}', 'UsersController@update');
});

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
    Route::get('/', 'EventiController@index');
    Route::get('/create', 'EventiController@create');
    Route::post('/store', 'EventiController@store');
    Route::get('/edit/{id}', 'EventiController@edit');
    Route::put('/update/{id}', 'EventiController@update');
    Route::delete('/destroy/{id}', 'EventiController@destroy');
});

// Prikaz, dodavanje, editovanje i brisanje magacina
Route::group(['prefix'=>'magacini', 'middleware' => 'role:admin|prodaja'], function (){
    Route::get('/', 'MagaciniController@index');
    Route::get('/create', 'MagaciniController@create');
    Route::post('/store', 'MagaciniController@store');
    Route::get('/edit/{id}', 'MagaciniController@edit');
    Route::put('/update/{id}', 'MagaciniController@update');
    Route::delete('/destroy/{id}', 'MagaciniController@destroy');
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

// Prikaz, dodavanje, editovanje i brisanje kuhinja
Route::group(['prefix'=>'kuhinje', 'middleware' => 'role:admin|prodaja'], function () {
    Route::get('/', 'KuhinjeController@index');
    Route::get('/create', 'KuhinjeController@create');
    Route::post('/store', 'KuhinjeController@store');
    Route::get('/edit/{id}', 'KuhinjeController@edit');
    Route::put('/update/{id}', 'KuhinjeController@update');
    Route::delete('/destroy/{id}', 'KuhinjeController@destroy');
});

// Prikaz, dodavanje, editovanje i brisanje inventara
Route::group(['prefix'=>'inventory', 'middleware' => 'role:admin|prodaja|magacin'], function () {
    Route::get('/', 'InventoryController@index');
    Route::get('/create', 'InventoryController@create');
    Route::post('/store', 'InventoryController@store');
    Route::get('/edit/{id}', 'InventoryController@edit');
    Route::put('/update/{id}', 'InventoryController@update');
    Route::delete('/destroy/{id}', 'InventoryController@destroy');
});

// Prikaz, dodavanje, editovanje i brisanje porudzbenica
Route::group(['prefix'=>'orders'], function() {
    Route::get('/', 'OrdersController@index')->middleware('role:admin|prodaja');
    Route::get('/create', 'OrdersController@create')->middleware('role:admin|prodaja');
    Route::post('/store', 'OrdersController@store')->middleware('role:admin|prodaja');
    Route::get('/edit/{id}', 'OrdersController@edit')->middleware('role:admin|prodaja');
    Route::put('/update/{id}', 'OrdersController@update')->middleware('role:admin|prodaja');
    Route::delete('/destroy/{id}', 'OrdersController@destroy')->middleware('role:admin|prodaja');

    //Samo kuvari imaju pristup
    Route::get('/kuhinja', 'OrdersController@kuhinja_pregled')->middleware('role:kuhinja');
    Route::post('/accept/{id}', 'OrdersController@accept_order')->middleware('role:kuhinja');
    Route::get('/kuhinja/prihvacene', 'OrdersController@kuhinja_prihvacene')->middleware('role:kuhinja');
    Route::post('/storniraj/{id}', 'OrdersController@storniraj')->middleware('role:kuhinja');
    Route::post('/finish/{id}', 'OrdersController@finalize_order')->middleware('role:kuhinja');

    Route::get('/magacin', 'OrdersController@finished_orders')->middleware('role:magacin');
});

Route::group(['prefix'=>'stavkeProizvoda'], function() {
    Route::get('/{id}', 'StavkeProizvodaController@index')->middleware('role:admin|prodaja|kuhinja');
    Route::get('/create/{id}', 'StavkeProizvodaController@create')->middleware('role:admin|prodaja');;
    Route::post('/store/{id}', 'StavkeProizvodaController@store')->middleware('role:admin|prodaja');;
});

Route::group(['prefix'=>'stavkeInventara'], function() {
    Route::get('/{id}', 'StavkeInventaraController@index')->middleware('role:admin|magacin|kuhinja');
    Route::get('/create/{id}', 'StavkeInventaraController@create')->middleware('role:admin|magacin|kuhinja');;
    Route::post('/store/{id}', 'StavkeInventaraController@store')->middleware('role:admin|magacin|kuhinja');;
});

Route::group(['prefix'=>'api', 'middleware' => 'role:admin|prodaja'], function () {
    Route::get('/product/{id}', 'ProductsController@getProductById');
    Route::delete('/product/{id}', 'ProductsController@deleteProductById');
});

// Kontakt strana
Route::get('/contact', 'ContactController@index');
Route::post('/contact/store', 'ContactController@store');




