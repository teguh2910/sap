<?php
Auth::routes();
Route::get('/', 'HomeController@index');
//crud bank
Route::get('/bank', 'bankController@index');
Route::get('/bank/create', 'bankController@create');
Route::post('/bank/create', 'bankController@store');
Route::get('/bank/edit/{id}', 'bankController@edit');
Route::post('/bank/edit/{id}', 'bankController@update');
Route::get('/bank/delete/{id}', 'bankController@delete');

//crud customer
Route::get('/customer', 'customerController@index');
Route::get('/customer/create', 'customerController@create');
Route::post('/customer/create', 'customerController@store');
Route::get('/customer/edit/{id}', 'customerController@edit');
Route::post('/customer/edit/{id}', 'customerController@update');
Route::get('/customer/delete/{id}', 'customerController@delete');

//crud part
Route::get('/part', 'partController@index');
Route::get('/part/create', 'partController@create');
Route::post('/part/create', 'partController@store');
Route::get('/part/edit/{id}', 'partController@edit');
Route::post('/part/edit/{id}', 'partController@update');
Route::get('/part/delete/{id}', 'partController@delete');

//crud po
Route::get('/po', 'poController@index');
Route::get('/po/create', 'poController@create');
Route::post('/po/create', 'poController@store');
Route::get('/po/edit/{id}', 'poController@edit');
Route::post('/po/edit/{id}', 'poController@update');
Route::get('/po/delete/{id}', 'poController@delete');

//crud top
Route::get('/top', 'topController@index');
Route::get('/top/create', 'topController@create');
Route::post('/top/create', 'topController@store');
Route::get('/top/edit/{id}', 'topController@edit');
Route::post('/top/edit/{id}', 'topController@update');
Route::get('/top/delete/{id}', 'topController@delete');

//crud truk
Route::get('/truk', 'trukController@index');
Route::get('/truk/create', 'trukController@create');
Route::post('/truk/create', 'trukController@store');
Route::get('/truk/edit/{id}', 'trukController@edit');
Route::post('/truk/edit/{id}', 'trukController@update');
Route::get('/truk/delete/{id}', 'trukController@delete');

//crud vendor
Route::get('/vendor', 'vendorController@index');
Route::get('/vendor/create', 'vendorController@create');
Route::post('/vendor/create', 'vendorController@store');
Route::get('/vendor/edit/{id}', 'vendorController@edit');
Route::post('/vendor/edit/{id}', 'vendorController@update');
Route::get('/vendor/delete/{id}', 'vendorController@delete');

//crud user
Route::get('/user', 'userController@index');
Route::get('/user/create', 'userController@create');
Route::post('/user/create', 'userController@store');
Route::get('/user/edit/{id}', 'userController@edit');
Route::post('/user/edit/{id}', 'userController@update');
Route::get('/user/delete/{id}', 'userController@delete');