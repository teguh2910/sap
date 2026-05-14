<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Carbon\Carbon;
use App\po_supplier, App\po_customer, App\gudang_satu, App\gudang_dua, App\invoice;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        // KPI Metrics
        $total_po_supplier = po_supplier::count();
        $total_po_customer = po_customer::count();
        $total_invoices = invoice::count();

        // Stock metrics
        $total_stock_g1 = gudang_satu::sum('beginning_balance');
        $total_stock_g2 = gudang_dua::sum('beginning_balance');
        $total_stock = $total_stock_g1 + $total_stock_g2;

        // Chart data - Top products by stock
        $top_products = gudang_satu::select('part_no', \DB::raw('sum(beginning_balance) as total_qty'))
                            ->groupBy('part_no')
                            ->orderBy('total_qty', 'desc')
                            ->limit(5)
                            ->get();

        // Stock by category
        $stock_by_category = gudang_satu::select('category_part', \DB::raw('sum(beginning_balance) as total_qty'))
                            ->groupBy('category_part')
                            ->get();

        return view('dashboard', compact([
            'total_po_supplier',
            'total_po_customer',
            'total_invoices',
            'total_stock',
            'total_stock_g1',
            'total_stock_g2',
            'top_products',
            'stock_by_category'
        ]));
    }
}

