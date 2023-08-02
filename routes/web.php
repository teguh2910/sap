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

//crud po supplier
Route::get('/po', 'PoSupplierController@index');
Route::get('/po/create', 'PoSupplierController@create');
Route::post('/po/create', 'PoSupplierController@store');
Route::get('/po/edit/{id}', 'PoSupplierController@edit');
Route::post('/po/edit/{id}', 'PoSupplierController@update');
Route::get('/po/delete/{id}', 'PoSupplierController@delete');
Route::get('/po/cetak/{id}', 'PoSupplierController@cetak');

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

//crud detailPO Supplier
Route::get('/detailpo/{id}', 'DetailPoSupplierController@index');
Route::get('/detailpo/create/{id}', 'DetailPoSupplierController@create');
Route::post('/detailpo/create/{id}', 'DetailPoSupplierController@store');
Route::get('/detailpo/edit/{id}', 'DetailPoSupplierController@edit');
Route::post('/detailpo/edit/{id}', 'DetailPoSupplierController@update');
Route::get('/detailpo/delete/{id}', 'DetailPoSupplierController@delete');

//crud detailPO customer
Route::get('/detailpocustomer/{id}', 'DetailPoCustomerController@index');
Route::get('/detailpocustomer/create/{id}', 'DetailPoCustomerController@create');
Route::post('/detailpocustomer/create/{id}', 'DetailPoCustomerController@store');
Route::get('/detailpocustomer/edit/{id}', 'DetailPoCustomerController@edit');
Route::post('/detailpocustomer/edit/{id}', 'DetailPoCustomerController@update');
Route::get('/detailpocustomer/delete/{id}', 'DetailPoCustomerController@delete');

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
Route::get('/prodg2/cetak/{id}', 'ProdG2Controller@cetak');

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
Route::get('/prodg1/cetak/{id}', 'ProdG1Controller@cetak');

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
Route::get('/sjg1/{id}', 'SjG1Controller@view');

//dashboard
Route::get('/filter_stok_all', 'DashboardController@filter_stok');
Route::post('/filter_stok_all', 'DashboardController@show_filter_stok');
Route::get('/stok_all', 'DashboardController@stok');
Route::get('/po_all', 'DashboardController@po');
Route::get('/hutang', 'DashboardController@hutang');
Route::get('/piutang', 'DashboardController@piutang');
Route::get('/pnl', 'DashboardController@pnl');

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
Route::get('incoming_cash/report', 'IncomingCashController@report');
Route::post('incoming_cash/report', 'IncomingCashController@report_show');

//crud out_cash
Route::get('out_cash', 'OutCashController@index');
Route::get('out_cash/create', 'OutCashController@create');
Route::post('out_cash/create', 'OutCashController@store');
Route::get('out_cash/edit/{id}', 'OutCashController@edit');
Route::post('out_cash/edit/{id}', 'OutCashController@update');
Route::get('out_cash/delete/{id}', 'OutCashController@delete');
Route::get('out_cash/report', 'OutCashController@report');
Route::post('out_cash/report', 'OutCashController@report_show');

//update by x-editable
Route::post('detail_po_gr/update','GrController@update_gr');
Route::post('detailprodg2/update','DetailProdG2Controller@update_detail_prod_g2');
Route::post('detailprodg1/update','DetailProdG1Controller@update_detail_prod_g1');

//crud sop
Route::get('/sop', 'SopController@index');
Route::get('/sop/create', 'SopController@create');
Route::post('/sop/create', 'SopController@store');
Route::get('/sop/edit/{id}', 'SopController@edit');
Route::post('/sop/edit/{id}', 'SopController@update');
Route::get('/sop/delete/{id}', 'SopController@delete');

//crud sto g2
Route::get('/stog2', 'StoController@index');
Route::get('/stog2/create', 'StoController@create');
Route::post('/stog2/create', 'StoController@store');
Route::get('/stog2/edit/{id}', 'StoController@edit');
Route::post('/stog2/edit/{id}', 'StoController@update');
Route::get('/stog2/delete/{id}', 'StoController@delete');

//crud sto g1
Route::get('/stog1', 'Stog1Controller@index');
Route::get('/stog1/create', 'Stog1Controller@create');
Route::post('/stog1/create', 'Stog1Controller@store');
Route::get('/stog1/edit/{id}', 'Stog1Controller@edit');
Route::post('/stog1/edit/{id}', 'Stog1Controller@update');
Route::get('/stog1/delete/{id}', 'Stog1Controller@delete');

//crud po customer
Route::get('/po_customer', 'PoCustomerController@index');
Route::get('/po_customer/create', 'PoCustomerController@create');
Route::post('/po_customer/create', 'PoCustomerController@store');
Route::get('/po_customer/edit/{id}', 'PoCustomerController@edit');
Route::post('/po_customer/edit/{id}', 'PoCustomerController@update');
Route::get('/po_customer/delete/{id}', 'PoCustomerController@delete');

//crud detail prod gudang dua
Route::get('/detailprodg2/{id}', 'DetailProdG2Controller@index');
Route::get('/detailprodg2/create/{id}', 'DetailProdG2Controller@create');
Route::post('/detailprodg2/create', 'DetailProdG2Controller@store');
Route::get('/detailprodg2/edit/{id}', 'DetailProdG2Controller@edit');
Route::post('/detailprodg2/edit/{id}', 'DetailProdG2Controller@update');
Route::get('/detailprodg2/delete/{id}', 'DetailProdG2Controller@delete');

//crud detail prod gudang satu
Route::get('/detailprodg1/{id}', 'DetailProdG1Controller@index');
Route::get('/detailprodg1/create/{id}', 'DetailProdG1Controller@create');
Route::post('/detailprodg1/create', 'DetailProdG1Controller@store');
Route::get('/detailprodg1/edit/{id}', 'DetailProdG1Controller@edit');
Route::post('/detailprodg1/edit/{id}', 'DetailProdG1Controller@update');
Route::get('/detailprodg1/delete/{id}', 'DetailProdG1Controller@delete');


//crud invoice
Route::get('/invoice', 'InvoiceController@index');
Route::get('/invoice/create', 'InvoiceController@create');
Route::post('/invoice/create', 'InvoiceController@store');
Route::get('/invoice/edit/{id}', 'InvoiceController@edit');
Route::post('/invoice/edit/{id}', 'InvoiceController@update');
Route::get('/invoice/delete/{id}', 'InvoiceController@delete');
Route::get('/invoice/cetak/{id}', 'InvoiceController@cetak');