<?php

namespace App\Http\Controllers;
use App\Models\GudangSatu;
use App\Models\GudangDua;
use App\Models\PoSupplier;
use App\Models\PoCustomer;
use App\Models\DetailPoSupplier;
use App\Models\DetailPoCustomer;
use App\Models\Gr;
use App\Models\ProdG2;
use App\Models\UsageG2;
use App\Models\Sj;
use App\Models\ProdG1;
use App\Models\UsageG1;
use App\Models\SjG1;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display the dashboard index.
     */
    public function index(Request $request)
    {
        // Basic dashboard data
        $data = [
            'gudang_satu_count' => GudangSatu::count(),
            'gudang_dua_count' => GudangDua::count(),
            'po_customer_count' => PoCustomer::count(),
        ];

        return view('dashboard', $data);
    }

    /**
     * Handle dashboard filter requests.
     */
    public function filter(Request $request)
    {
        // Handle filter parameters
        $bulan = $request->input('bulan');
        $tahun = $request->input('tahun');

        // Basic dashboard data (same as index for now)
        $data = [
            'gudang_satu_count' => GudangSatu::count(),
            'gudang_dua_count' => GudangDua::count(),
            'po_customer_count' => PoCustomer::count(),
            'bulan' => $bulan,
            'tahun' => $tahun,
        ];

        return view('dashboard', $data);
    }

    /**
     * Display PO Customer dashboard.
     */
    public function poCustomer()
    {
        $pos = PoCustomer::with('customer')->latest()->take(10)->get();
        return view('dashboard.po_customer', compact('pos'));
    }

    /**
     * Display stock customer dashboard.
     */
    public function stockCustomer()
    {
        $po_customer = GudangSatu::latest()->take(10)->get();
        return view('dashboard.stock_customer', compact('po_customer'));
    }

    /**
     * Display qty prod customer dashboard.
     */
    public function qtyProdCustomer()
    {
        $po_customer = ProdG1::latest()->take(10)->get();
        return view('dashboard.qty_prod_customer', compact('po_customer'));
    }

    public function stok(Request $request) {
        $gudang_satu = GudangSatu::select('category_part', \DB::raw('sum(beginning_balance) as total_beginning_balance,sum(usage_balance) as total_usage_balance,sum(incoming_balance) as total_incoming_balance'))

                            ->groupBy('category_part')
                            ->get();
        $gudang_dua = GudangDua::select('category_part', \DB::raw('sum(beginning_balance) as total_beginning_balance,sum(usage_balance) as total_usage_balance,sum(incoming_balance) as total_incoming_balance'))
                          ->groupBy('category_part')
                          ->get();
        return view('dashboard/stok',compact(['gudang_satu','gudang_dua']));
    }
    public function po() {
        $pos = DetailPoSupplier::all();
        return view('dashboard/po',compact(['pos']));
    }
    public function po_customer() {
        $pos = DetailPoCustomer::all();
        return view('dashboard/po_customer',compact(['pos']));
    }
    public function hutang() {
        $pos = DetailPoSupplier::all();
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
        $fg_g2=GudangDua::where('category_part','FG')->sum('beginning_balance');
        $rm_g2=GudangDua::where('category_part','RM')->sum('beginning_balance');
        $gr_g2=Gr::whereMonth('tgl_gr',$request->bulan)->whereYear('tgl_gr',$request->tahun)->where('gudang','gudang_dua')->sum('qty_gr');
        $prod_g2=ProdG2::whereMonth('tgl_prod_g2',$request->bulan)
                ->whereYear('tgl_prod_g2',$request->tahun)
                ->with('detail_prod_g2')
                ->get()
                ->pluck('detail_prod_g2')
                ->flatten()
                ->sum('qty_prod_g2');

        $usage_g2=UsageG2::whereMonth('tgl_usage_g2',$request->bulan)->whereYear('tgl_usage_g2',$request->tahun)->sum('qty_usage_g2');
        $sj_g2=Sj::whereMonth('tgl_sj',$request->bulan)->whereYear('tgl_sj',$request->tahun)->sum('qty_sj');
        //gudang1
        $fg_g1=GudangSatu::where('category_part','FG')->sum('beginning_balance');
        $rm_g1=GudangSatu::where('category_part','RM')->sum('beginning_balance');
        $gr_g1=Gr::whereMonth('tgl_gr',$request->bulan)->whereYear('tgl_gr',$request->tahun)->where('gudang','gudang_satu')->sum('qty_gr');
        $prod_g1=ProdG1::whereMonth('tgl_prod_g1',$request->bulan)
                ->whereYear('tgl_prod_g1',$request->tahun)
                ->with('detail_prod_g1')
                ->get()
                ->pluck('detail_prod_g1')
                ->flatten()
                ->sum('qty_prod_g1');
        $usage_g1=UsageG1::whereMonth('tgl_usage_g1',$request->bulan)->whereYear('tgl_usage_g1',$request->tahun)->sum('qty_usage_g1');
        $sj_g1=SjG1::whereMonth('tgl_sj_g1',$request->bulan)->whereYear('tgl_sj_g1',$request->tahun)->sum('qty_sj_g1');
        return view('dashboard/show_filter_stok',compact(['gr_g2','prod_g2','usage_g2','sj_g2','fg_g2','rm_g2','gr_g1','prod_g1','usage_g1','sj_g1','fg_g1','rm_g1']));
        
    }
    public function stock_customer(){
        $po_customer = DetailPoCustomer::all();
        return view('dashboard/stock_customer',compact('po_customer'));
    }
    public function qty_prod_customer() {
        $po_customer = DetailPoCustomer::all();
        return view('dashboard/qty_prod_customer',compact('po_customer'));
    }

}
