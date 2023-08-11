<?php

namespace App\Http\Controllers;
use App\gudang_satu, 
    App\gudang_dua, 
    App\po_supplier,
    App\po_customer, 
    App\detail_po_supplier,
    App\detail_po_customer, 
    App\gr, 
    App\prod_g2, 
    App\usage_g2, 
    App\sj, 
    App\prod_g1, 
    App\usage_g1, 
    App\sj_g1;
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
        $pos=detail_po_supplier::all();
        return view('dashboard/po',compact(['pos']));
    }
    public function po_customer() {
        $pos=detail_po_supplier::all();
        return view('dashboard/po_customer',compact(['pos']));
    }
    public function hutang() {
        $pos=detail_po_supplier::all();
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
    public function show_filter_stok(Request $request) {
        //gudang2
        $fg_g2=gudang_dua::where('category_part','FG')->sum('beginning_balance');
        $rm_g2=gudang_dua::where('category_part','RM')->sum('beginning_balance');
        $gr_g2=gr::whereMonth('tgl_gr',$request->bulan)->whereYear('tgl_gr',$request->tahun)->where('gudang','gudang_dua')->sum('qty_gr');
        $prod_g2=prod_g2::whereMonth('tgl_prod_g2',$request->bulan)
                ->whereYear('tgl_prod_g2',$request->tahun)                
                ->with('detail_prod_g2')
                ->get()
                ->pluck('detail_prod_g2')
                ->flatten()
                ->sum('qty_prod_g2');
                        
        $usage_g2=usage_g2::whereMonth('tgl_usage_g2',$request->bulan)->whereYear('tgl_usage_g2',$request->tahun)->sum('qty_usage_g2');
        $sj_g2=sj::whereMonth('tgl_sj',$request->bulan)->whereYear('tgl_sj',$request->tahun)->sum('qty_sj');
        //gudang1
        $fg_g1=gudang_satu::where('category_part','FG')->sum('beginning_balance');
        $rm_g1=gudang_satu::where('category_part','RM')->sum('beginning_balance');
        $gr_g1=gr::whereMonth('tgl_gr',$request->bulan)->whereYear('tgl_gr',$request->tahun)->where('gudang','gudang_satu')->sum('qty_gr');
        $prod_g1=prod_g1::whereMonth('tgl_prod_g1',$request->bulan)
                ->whereYear('tgl_prod_g1',$request->tahun)
                ->with('detail_prod_g1')
                ->get()
                ->pluck('detail_prod_g1')
                ->flatten()
                ->sum('qty_prod_g1');
        $usage_g1=usage_g1::whereMonth('tgl_usage_g1',$request->bulan)->whereYear('tgl_usage_g1',$request->tahun)->sum('qty_usage_g1');
        $sj_g1=sj_g1::whereMonth('tgl_sj_g1',$request->bulan)->whereYear('tgl_sj_g1',$request->tahun)->sum('qty_sj_g1');        
        return view('dashboard/show_filter_stok',compact(['gr_g2','prod_g2','usage_g2','sj_g2','fg_g2','rm_g2','gr_g1','prod_g1','usage_g1','sj_g1','fg_g1','rm_g1']));
        
    }
    public function stock_customer(){
        return view('dashboard/stock_customer');
    }
    public function qty_prod_customer() {
        $po_c=detail_po_customer::all();
        return view('dashboard/qty_prod_customer',compact('po_c'));
    }

}
