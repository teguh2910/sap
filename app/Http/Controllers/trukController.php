<?php

namespace App\Http\Controllers;
use App\truk;
use Illuminate\Http\Request;

class trukController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $truk = truk::all();
        return view('truk.index', compact('truk'));
    }
    public function create()
    {
        return view('truk.create');
    }
    public function store(Request $request)
    {
        $truk = new truk;
        $truk->kode_truk = $request->kode_truk;
        $truk->plat_no = $request->plat_no;
        $truk->driver = $request->driver;
        $truk->save();
        return redirect('/truk');
    }
    public function edit($id)
    {
        $truk = truk::find($id);
        return view('truk.edit', compact('truk'));
    }
    public function update(Request $request, $id)
    {
        $truk = truk::find($id);
        $truk->kode_truk = $request->kode_truk;
        $truk->plat_no = $request->plat_no;
        $truk->driver = $request->driver;
        $truk->save();
        return redirect('/truk');
    }
    public function delete($id)
    {
        $truk = truk::find($id);
        $truk->delete();
        return redirect('/truk');
    }
}
