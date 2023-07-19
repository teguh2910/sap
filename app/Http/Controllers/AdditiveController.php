<?php

namespace App\Http\Controllers;
use App\additive;
use Illuminate\Http\Request;

class AdditiveController extends Controller
{
    public function index() {
        $additives = additive::all();
        return view('additive/index',compact('additives'));
    }
    public function create() {
        return view('additive/create');
    }
    public function store(Request $request) {        
        $additive = new additive;
        $additive->kode_additive = $request->kode_additive;   
        $additive->nama_additive = $request->nama_additive;
        $additive->price_additive = $request->price_additive;
        $additive->save();
        return redirect('/additive');
    }
    public function edit($id) {
        $additive = additive::find($id);
        return view('additive/edit', compact('additive'));
    }
    public function update($id, Request $request) {
        $additive = additive::find($id);
        $additive->kode_additive = $request->kode_additive;   
        $additive->nama_additive = $request->nama_additive;
        $additive->price_additive = $request->price_additive;
        $additive->save();
        return redirect('/additive');
    }
    public function delete($id) {
        $additive = additive::find($id);
        $additive->delete();
        return redirect('/additive');
    }
}
