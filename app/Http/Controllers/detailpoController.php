<?php

namespace App\Http\Controllers;
use App\detail_po, App\stok;
use Illuminate\Http\Request;

class detailpoController extends Controller
{
    public function index() {
        $detailpos=detail_po::with('stoks')->get();
        return view('detail_po/index',compact('detailpos'));
    }
    public function create() {
        $stoks=stok::all();
        return view('detail_po/create',compact('stoks'));
    }
}
