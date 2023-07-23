<?php

namespace App\Http\Controllers;
use App\cout_cash;
use Illuminate\Http\Request;

class OutCashController extends Controller
{
    function create() {
        $banks = bank::all();
        $customers = customer::all();
        return view('cout_cash/create',compact('banks','customers'));
    }
    function store(Request $request) {
        $out_cash = new cout_cash;
        $out_cash->id_bank = $request->id_bank;
        $out_cash->id_customer = $request->id_customer;
        $out_cash->amount_incoming = $request->amount_incoming;
        $out_cash->po_customer = $request->po_customer;
        $out_cash->tgl_out_cash = $request->tgl_out_cash;
        $out_cash->top = $request->top;
        $out_cash->save();
        //update cash flow
        $bank = bank::where('id_bank',$request->id_bank)->first();
        $total_incoming = out_cash::where('id_bank',$request->id_bank)->sum('amount_incoming');
        $out_cash= cashflow::where('bank',$bank->nama_bank)->first();
        $out_cash->incoming_balance = $total_incoming;
        $out_cash->save();
        return redirect('cashflow');
    }
}
