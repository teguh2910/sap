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
Route::get('/po/cetak/{id}', 'poController@cetak');

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

//crud stok
Route::get('/stok', 'stokController@index');
Route::get('/stok/create', 'stokController@create');
Route::post('/stok/create', 'stokController@store');
Route::get('/stok/edit/{id}', 'stokController@edit');
Route::post('/stok/edit/{id}', 'stokController@update');
Route::get('/stok/delete/{id}', 'stokController@delete');

//crud prod
Route::get('/prod', 'prodController@index');
Route::get('/prod/create', 'prodController@create');
Route::post('/prod/create', 'prodController@store');
Route::get('/prod/edit/{id}', 'prodController@edit');
Route::post('/prod/edit/{id}', 'prodController@update');
Route::get('/prod/delete/{id}', 'prodController@delete');

//crud sj
Route::get('/sj', 'sjController@index');
Route::get('/sj/create', 'sjController@create');
Route::post('/sj/create', 'sjController@store');
Route::get('/sj/edit/{id}', 'sjController@edit');
Route::post('/sj/edit/{id}', 'sjController@update');
Route::get('/sj/delete/{id}', 'sjController@delete');

//crud produk
Route::get('/produk', 'ProdukController@index');
Route::get('/produk/create', 'ProdukController@create');
Route::post('/produk/create', 'ProdukController@store');
Route::get('/produk/edit/{id}', 'ProdukController@edit');
Route::post('/produk/edit/{id}', 'ProdukController@update');
Route::get('/produk/delete/{id}', 'ProdukController@delete');

//crud material
Route::get('/material', 'MaterialController@index');
Route::get('/material/create', 'MaterialController@create');
Route::post('/material/create', 'MaterialController@store');
Route::get('/material/edit/{id}', 'MaterialController@edit');
Route::post('/material/edit/{id}', 'MaterialController@update');
Route::get('/material/delete/{id}', 'MaterialController@delete');

//crud basemetal
Route::get('/basemetal', 'BasemetalController@index');
Route::get('/basemetal/create', 'BasemetalController@create');
Route::post('/basemetal/create', 'BasemetalController@store');
Route::get('/basemetal/edit/{id}', 'BasemetalController@edit');
Route::post('/basemetal/edit/{id}', 'BasemetalController@update');
Route::get('/basemetal/delete/{id}', 'BasemetalController@delete');

//crud additive
Route::get('/additive', 'AdditiveController@index');
Route::get('/additive/create', 'AdditiveController@create');
Route::post('/additive/create', 'AdditiveController@store');
Route::get('/additive/edit/{id}', 'AdditiveController@edit');
Route::post('/additive/edit/{id}', 'AdditiveController@update');
Route::get('/additive/delete/{id}', 'AdditiveController@delete');