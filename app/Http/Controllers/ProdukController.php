<?php

namespace App\Http\Controllers;
use App\produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $produk = produk::all();
        return view('produk.index', compact('produk'));
    }
    public function create() {
        return view('produk.create');
    }
    public function store(Request $request){
        $produk = new produk;
        $produk->kode_produk = $request->kode_produk;
        $produk->type = $request->nama_produk;
        $produk->price = $request->harga_produk;
        $produk->save();
        return redirect('produk');
    }
    public function edit($id) {
        $produk=produk::find($id);
        return view('produk.edit', compact('produk'));        
    }
    public function update(Request $request,$id) {
        $produk=produk::find($id);
        $produk->kode_produk = $request->kode_produk;
        $produk->type = $request->nama_produk;
        $produk->price = $request->price;
        $produk->save();
        return redirect('produk');
    }
    public function delete($id){
        produk::find($id)->delete();
        return redirect('produk');
    }
}
