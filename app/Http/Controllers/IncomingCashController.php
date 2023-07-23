<?php

namespace App\Http\Controllers;
use App\bank, App\customer, App\incoming_cash, App\cashflow;
use Illuminate\Http\Request;

class IncomingCashController extends Controller
{
    function create() {
        $banks = bank::all();
        $customers = customer::all();
        return view('incoming_cash/create',compact('banks','customers'));
    }
    function store(Request $request) {
        $incoming_cash = new incoming_cash;
        $incoming_cash->id_bank = $request->id_bank;
        $incoming_cash->id_customer = $request->id_customer;
        $incoming_cash->amount_incoming = $request->amount_incoming;
        $incoming_cash->po_customer = $request->po_customer;
        $incoming_cash->tgl_incoming_cash = $request->tgl_incoming_cash;
        $incoming_cash->top = $request->top;
        $incoming_cash->save();
        //update cash flow
        $bank = bank::where('id_bank',$request->id_bank)->first();
        $total_incoming = incoming_cash::where('id_bank',$request->id_bank)->sum('amount_incoming');
        $incoming_cash= cashflow::where('bank',$bank->nama_bank)->first();
        $incoming_cash->incoming_balance = $total_incoming;
        $incoming_cash->save();
        return redirect('cashflow');
    }
    function index() {
        return view('incoming_cash/index', ['incoming_cash' => incoming_cash::with(['banks','customers'])->get()]);
    }
}
