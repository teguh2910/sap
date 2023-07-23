<?php

namespace App\Http\Controllers;
use App\gudang_satu, App\gudang_dua, App\po, App\detail_po, App\gr;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function stok() {
        $gudang_satu = gudang_satu::select('category_part', \DB::raw('sum(beginning_balance) as total_beginning_balance,sum(usage_balance) as total_usage_balance,sum(incoming_balance) as total_incoming_balance'))
                          ->groupBy('category_part')
                          ->get();
        $gudang_dua = gudang_dua::select('category_part', \DB::raw('sum(beginning_balance) as total_beginning_balance,sum(usage_balance) as total_usage_balance,sum(incoming_balance) as total_incoming_balance'))
                          ->groupBy('category_part')
                          ->get();
        return view('dashboard/stok',compact(['gudang_satu','gudang_dua']));
    }
    function po() {
        $grs=gr::all();
        return view('dashboard/po',compact(['grs']));
    }
}
