<?php

use App\Http\Controllers\Api\BankController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// API v1 routes
Route::prefix('v1')->group(function () {
    Route::middleware('auth:sanctum')->group(function () {
        // Bank API
        Route::apiResource('banks', BankController::class);

        // Additional API endpoints can be added here
        Route::get('/dashboard/stats', function () {
            return response()->json([
                'banks_count' => \App\Models\Bank::count(),
                'customers_count' => \App\Models\Customer::count(),
                'vendors_count' => \App\Models\Vendor::count(),
            ]);
        });
    });
});
