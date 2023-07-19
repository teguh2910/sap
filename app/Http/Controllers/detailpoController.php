<?php

namespace App\Http\Controllers;
use App\detail_po, App\stok, App\po;
use Illuminate\Http\Request;

class detailpoController extends Controller
{
    public function index($id) {
        $detailpos=detail_po::with('stoks')->where('id_po',$id);
        return view('detail_po/index',compact(['detailpos','id']));
    }
    public function create($id) {
        $po=po::find($id);
        $stoks=stok::all();
        return view('detail_po/create',compact(['stoks','po']));
    }
}
