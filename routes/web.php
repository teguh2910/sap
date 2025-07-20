<?php

use App\Http\Controllers\BankController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PoSupplierController;
use App\Http\Controllers\TrukController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Authentication Routes
Auth::routes();

// Dashboard
Route::get('/', [HomeController::class, 'index'])->name('home');

// Resource Routes with middleware
Route::middleware(['auth'])->group(function () {

    // Bank CRUD
    Route::resource('banks', BankController::class)->parameters(['banks' => 'bank:id_bank']);

    // Customer CRUD
    Route::resource('customers', CustomerController::class)->parameters(['customers' => 'customer:id_customer']);

    // Purchase Order Supplier CRUD
    Route::resource('po-suppliers', PoSupplierController::class)->parameters(['po-suppliers' => 'poSupplier:id_po']);
    Route::get('/po-suppliers/{poSupplier}/print', [PoSupplierController::class, 'print'])->name('po-suppliers.print');

    // Truck CRUD
    Route::resource('trucks', TrukController::class)->parameters(['trucks' => 'truk:id_truk']);

    // Vendor CRUD
    Route::resource('vendors', VendorController::class)->parameters(['vendors' => 'vendor:id_vendor']);

    // User Management
    Route::resource('users', UserController::class)->except(['show']);

    // Additional Controllers
    Route::resource('part-suppliers', App\Http\Controllers\PartSupplierController::class);
    Route::resource('part-customers', App\Http\Controllers\PartCustomerController::class);
    Route::resource('po-customers', App\Http\Controllers\PoCustomerController::class);
    Route::resource('warehouses-1', App\Http\Controllers\GudangSatuController::class);
    Route::resource('warehouses-2', App\Http\Controllers\GudangDuaController::class);
    Route::resource('goods-receipts', App\Http\Controllers\GrController::class);
    Route::resource('productions-g1', App\Http\Controllers\ProdG1Controller::class);
    Route::resource('productions-g2', App\Http\Controllers\ProdG2Controller::class);
    Route::resource('usages-g1', App\Http\Controllers\UsageG1Controller::class);
    Route::resource('usages-g2', App\Http\Controllers\UsageG2Controller::class);
    Route::resource('delivery-notes', App\Http\Controllers\SjController::class);
    Route::resource('delivery-notes-g1', App\Http\Controllers\SjG1Controller::class);
    Route::resource('invoices', App\Http\Controllers\InvoiceController::class);
    Route::resource('incoming-cash', App\Http\Controllers\IncomingCashController::class);
    Route::resource('outgoing-cash', App\Http\Controllers\OutCashController::class);
    Route::resource('cashflows', App\Http\Controllers\CashflowController::class);
    Route::resource('sops', App\Http\Controllers\SopController::class);

    // Dashboard routes
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/po', [DashboardController::class, 'po'])->name('dashboard.po');
    Route::get('/dashboard/po-customer', [DashboardController::class, 'poCustomer'])->name('dashboard.po-customer');
    Route::get('/dashboard/hutang', [DashboardController::class, 'hutang'])->name('dashboard.hutang');

    // Legacy route compatibility (temporary - remove after frontend update)
    Route::get('/bank', [BankController::class, 'index']);
    Route::get('/customer', [CustomerController::class, 'index']);
    Route::get('/po', [PoSupplierController::class, 'index']);
    Route::get('/truk', [TrukController::class, 'index']);
    Route::get('/vendor', [VendorController::class, 'index']);
    Route::get('/user', [UserController::class, 'index']);

    // Additional legacy routes for specific functionality
    Route::get('/gudangsatu', [App\Http\Controllers\GudangSatuController::class, 'index']);
    Route::get('/gudangdua', [App\Http\Controllers\GudangDuaController::class, 'index']);
    Route::get('/gr', [App\Http\Controllers\GrController::class, 'index']);
    Route::get('/sjg2', [App\Http\Controllers\SjController::class, 'index']);
    Route::get('/detailpo/{id}', [App\Http\Controllers\DetailPoSupplierController::class, 'index']);
    Route::get('/detailpocustomer/{id}', [App\Http\Controllers\DetailPoCustomerController::class, 'index']);

});