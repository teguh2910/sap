<?php

namespace App\Http\Controllers;
use App\bank;
use Illuminate\Http\Request;

class bankController extends Controller
{
    public function index() {
        $bank = bank::all();
        return view('bank/index', compact('bank'));
    }
    public function create() {
        return view ('bank/create');
    }
    public function store(Request $request) {
        $bank = new bank;
        $bank->kode_bank = $request->kode_bank;
        $bank->nama_bank = $request->nama_bank;
        $bank->no_rek_bank = $request->no_rek_bank;
        $bank->currency_bank = $request->currency_bank;
        $bank->save();
        return redirect('bank');
    }
    public function edit($id) {
        $bank = bank::find($id);
        return view('bank/edit', compact(['bank']));
    }
    public function update(Request $request, $id) {
        $bank = bank::find($id);
        $bank->kode_bank = $request->kode_bank;
        $bank->nama_bank = $request->nama_bank;
        $bank->no_rek_bank = $request->no_rek_bank;
        $bank->currency_bank = $request->currency_bank;
        $bank->save();
        return redirect('bank');
    }
    public function delete($id) {
        $bank = bank::find($id);
        $bank->delete();
        return redirect('bank');
    }

}
