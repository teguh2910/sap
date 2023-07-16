<?php

namespace App\Http\Controllers;
use App\top;
use Illuminate\Http\Request;

class topController extends Controller
{
    public function index() {
        $top = top::all();
        return view('top/index', compact('top'));
    }
    public function create() {
        return view ('top/create');
    }
    public function store(Request $request) {
        $top = new top;
        $top->name_top = $request->name_top;
        $top->save();
        return redirect('top');
    }
    public function edit($id) {
        $top = top::find($id);
        return view('top/edit', compact(['top']));
    }
    public function update(Request $request, $id) {
        $top = top::find($id);
        $top->name_top = $request->name_top;
        $top->save();
        return redirect('top');
    }
    public function delete($id) {
        $top = top::find($id);
        $top->delete();
        return redirect('top');
    }
}
