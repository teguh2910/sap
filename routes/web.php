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

//crud sj gudang dua
Route::get('/sjg2', 'SjController@index');
Route::get('/sjg2/create', 'SjController@create');
Route::post('/sjg2/create', 'SjController@store');
Route::get('/sjg2/edit/{id}', 'SjController@edit');
Route::post('/sjg2/edit/{id}', 'SjController@update');
Route::get('/sjg2/delete/{id}', 'SjController@delete');

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

//crud detailPO
Route::get('/detailpo/{id}', 'detailpoController@index');
Route::get('/detailpo/create/{id}', 'detailpoController@create');
Route::post('/detailpo/create/{id}', 'detailpoController@store');
Route::get('/detailpo/edit/{id}', 'detailpoController@edit');
Route::post('/detailpo/edit/{id}', 'detailpoController@update');
Route::get('/detailpo/delete/{id}', 'detailpoController@delete');

//crud gudang_satu
Route::get('/gudangsatu', 'GudangSatuController@index');
Route::get('/gudangsatu/create', 'GudangSatuController@create');
Route::post('/gudangsatu/create', 'GudangSatuController@store');
Route::get('/gudangsatu/edit/{id}', 'GudangSatuController@edit');
Route::post('/gudangsatu/edit/{id}', 'GudangSatuController@update');
Route::get('/gudangsatu/delete/{id}', 'GudangSatuController@delete');

//crud gudang_dua
Route::get('/gudangdua', 'GudangDuaController@index');
Route::get('/gudangdua/create', 'GudangDuaController@create');
Route::post('/gudangdua/create', 'GudangDuaController@store');
Route::get('/gudangdua/edit/{id}', 'GudangDuaController@edit');
Route::post('/gudangdua/edit/{id}', 'GudangDuaController@update');
Route::get('/gudangdua/delete/{id}', 'GudangDuaController@delete');


//crud gr
Route::get('/gr', 'GrController@index');
Route::get('/gr/create', 'GrController@create');
Route::post('/gr/create', 'GrController@store');
Route::get('/gr/edit/{id}', 'GrController@edit');
Route::post('/gr/edit/{id}', 'GrController@update');
Route::get('/gr/delete/{id}', 'GrController@delete');


//crud prod_g2
Route::get('/prodg2', 'ProdG2Controller@index');
Route::get('/prodg2/create', 'ProdG2Controller@create');
Route::post('/prodg2/create', 'ProdG2Controller@store');
Route::get('/prodg2/edit/{id}', 'ProdG2Controller@edit');
Route::post('/prodg2/edit/{id}', 'ProdG2Controller@update');
Route::get('/prodg2/delete/{id}', 'ProdG2Controller@delete');

//crud usage_g2
Route::get('/usageg2', 'UsageG2Controller@index');
Route::get('/usageg2/create', 'UsageG2Controller@create');
Route::post('/usageg2/create', 'UsageG2Controller@store');
Route::get('/usageg2/edit/{id}', 'UsageG2Controller@edit');
Route::post('/usageg2/edit/{id}', 'UsageG2Controller@update');
Route::get('/usageg2/delete/{id}', 'UsageG2Controller@delete');


//crud prod_g1
Route::get('/prodg1', 'ProdG1Controller@index');
Route::get('/prodg1/create', 'ProdG1Controller@create');
Route::post('/prodg1/create', 'ProdG1Controller@store');
Route::get('/prodg1/edit/{id}', 'ProdG1Controller@edit');
Route::post('/prodg1/edit/{id}', 'ProdG1Controller@update');
Route::get('/prodg1/delete/{id}', 'ProdG1Controller@delete');

//crud usage_g1
Route::get('/usageg1', 'UsageG1Controller@index');
Route::get('/usageg1/create', 'UsageG1Controller@create');
Route::post('/usageg1/create', 'UsageG1Controller@store');
Route::get('/usageg1/edit/{id}', 'UsageG1Controller@edit');
Route::post('/usageg1/edit/{id}', 'UsageG1Controller@update');
Route::get('/usageg1/delete/{id}', 'UsageG1Controller@delete');

//crud sje_g1
Route::get('/sjg1', 'SjG1Controller@index');
Route::get('/sjg1/create', 'SjG1Controller@create');
Route::post('/sjg1/create', 'SjG1Controller@store');
Route::get('/sjg1/edit/{id}', 'SjG1Controller@edit');
Route::post('/sjg1/edit/{id}', 'SjG1Controller@update');
Route::get('/sjg1/delete/{id}', 'SjG1Controller@delete');

//dashboard
Route::get('/stok_all', 'DashboardController@stok');
Route::get('/po_all', 'DashboardController@po');

//crud cash
Route::get('/cashflow', 'CashflowController@index');
Route::get('/cashflow/create', 'CashflowController@create');
Route::post('/cashflow/create', 'CashflowController@store');
Route::get('/cashflow/edit/{id}', 'CashflowController@edit');
Route::post('/cashflow/edit/{id}', 'CashflowController@update');
Route::get('/cashflow/delete/{id}', 'CashflowController@delete');

//crud incoming_cash
Route::get('incoming_cash', 'IncomingCashController@index');
Route::get('incoming_cash/create', 'IncomingCashController@create');
Route::post('incoming_cash/create', 'IncomingCashController@store');
Route::get('incoming_cash/edit/{id}', 'IncomingCashController@edit');
Route::post('incoming_cash/edit/{id}', 'IncomingCashController@update');
Route::get('incoming_cash/delete/{id}', 'IncomingCashController@delete');

//crud out_cash
Route::get('out_cash', 'OutCashController@index');
Route::get('out_cash/create', 'OutCashController@create');
Route::post('out_cash/create', 'OutCashController@store');
Route::get('out_cash/edit/{id}', 'OutCashController@edit');
Route::post('out_cash/edit/{id}', 'OutCashController@update');
Route::get('out_cash/delete/{id}', 'OutCashController@delete');

//gr update by detail po
Route::post('detail_po_gr/update','GrController@update_gr');