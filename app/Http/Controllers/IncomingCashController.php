<?php

namespace App\Http\Controllers;
use App\Models\Bank;
use App\Models\Customer;
use App\Models\PoCustomer;
use App\Models\IncomingCash;
use App\Models\Cashflow;
use Illuminate\Http\Request;

class IncomingCashController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    function create() {
        $banks = Bank::all();
        $customers = Customer::all();
        $po_customer = PoCustomer::all();
        return view('incoming_cash/create',compact('banks','customers','po_customer'));
    }
    function store(Request $request) {
        $incoming_cash = new IncomingCash;
        $incoming_cash->id_bank = $request->id_bank;
        $incoming_cash->id_customer = $request->id_customer;
        $incoming_cash->amount_incoming = $request->amount_incoming;
        $incoming_cash->po_customer = $request->po_customer;
        $incoming_cash->tgl_incoming_cash = $request->tgl_incoming_cash;
        $incoming_cash->top = $request->top;
        $incoming_cash->save();
        //update cash flow
        $bank = Bank::where('id_bank',$request->id_bank)->first();
        $total_incoming = IncomingCash::where('id_bank',$request->id_bank)->sum('amount_incoming');
        $incoming_cash= Cashflow::where('bank',$bank->nama_bank)->first();
        $incoming_cash->incoming_balance = $total_incoming;
        $incoming_cash->save();
        return redirect('cashflow');
    }
    function index() {
        return view('incoming_cash/index', ['incoming_cash' => IncomingCash::with(['bank','customer'])->get()]);
    }
    public function report() {
        return view('incoming_cash/report');
    }
    public function report_show(Request $request) {
        $start_date=$request->start_date;
        $end_date=$request->end_date;
        $incoming_cash = IncomingCash::whereBetween('tgl_incoming_cash', [$start_date, $end_date])->get();
        return view('incoming_cash/report_show',compact('incoming_cash','start_date','end_date'));
    }
}
