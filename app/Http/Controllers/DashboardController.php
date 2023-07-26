<?php

namespace App\Http\Controllers;
use App\gudang_satu, App\gudang_dua, App\po, App\detail_po, App\gr;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function stok(Request $request) {
        $gudang_satu = gudang_satu::select('category_part', \DB::raw('sum(beginning_balance) as total_beginning_balance,sum(usage_balance) as total_usage_balance,sum(incoming_balance) as total_incoming_balance'))
                            
                            ->groupBy('category_part')
                            ->get();
        $gudang_dua = gudang_dua::select('category_part', \DB::raw('sum(beginning_balance) as total_beginning_balance,sum(usage_balance) as total_usage_balance,sum(incoming_balance) as total_incoming_balance'))
                          ->groupBy('category_part')
                          ->get();
        return view('dashboard/stok',compact(['gudang_satu','gudang_dua']));
    }
    public function po() {
        $grs=gr::all();
        return view('dashboard/po',compact(['grs']));
    }
    public function hutang() {
        $pos=detail_po::all();
        // Group the purchase orders by 'id_po' and calculate the sum of the amount (qty_po * harga_po) for each group
        $po_by_id = $pos->groupBy('id_po')->map(function ($group) {
            return $group->sum(function ($item) {
                return $item->qty_po * $item->harga_po;
            });           
        });
        // Load the 'outCashes' relationship for the collection of DetailPo
        $pos->load('out_cashs');
        //dd($po_by_id);
        return view('dashboard/hutang',compact(['po_by_id','pos']));
    }
    public function piutang() {
        return view('dashboard/piutang');
    }
    public function pnl() {
        return view('dashboard/pnl');
    }
    public function filter_stok() {
        return view('dashboard/filter_stok');
    }
}
