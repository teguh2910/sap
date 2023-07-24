<?php

namespace App\Http\Controllers;
use App\out_cash, App\bank, App\vendor, App\cashflow, App\po;
use Illuminate\Http\Request;

class OutCashController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    function create() {
        $banks = bank::all();
        $vendors = vendor::all();
        $pos= po::all();
        return view('out_cash/create',compact('banks','vendors','pos'));
    }
    function store(Request $request) {
        $out_cash = new out_cash;
        $out_cash->id_bank = $request->id_bank;
        $out_cash->id_po = $request->id_po;
        $out_cash->amount_out = $request->amount_out;
        $out_cash->tgl_out_cash = $request->tgl_out_cash;
        if($request->category=='lain-lain'){
            $out_cash->category = $request->category."(".$request->category_lain.")";    
        }else{
        $out_cash->category = $request->category;
        }
        $out_cash->save();
        //update cash flow
        $bank = bank::where('id_bank',$request->id_bank)->first();
        $total_out = out_cash::where('id_bank',$request->id_bank)->sum('amount_out');
        $out_cash= cashflow::where('bank',$bank->nama_bank)->first();
        $out_cash->out_balance = $total_out;
        $out_cash->save();
        return redirect('cashflow');
    }
    function index() {
        return view('out_cash/index', ['out_cash' => out_cash::with(['banks','pos'])->get()]);
    }
    public function report() {
        return view('out_cash/report');
    }
    public function report_show(Request $request) {
        $start_date=$request->start_date;
        $end_date=$request->end_date;
        $out_cash = out_cash::whereBetween('tgl_out_cash', [$start_date, $end_date])->get();
        return view('out_cash/report_show',compact('out_cash','start_date','end_date'));
    }
}
