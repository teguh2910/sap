<?php

namespace App\Http\Controllers;
use App\sop;
use Illuminate\Http\Request;

class SopController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index() {
        $sop = sop::all();
        return view('sop/index', ['sop' => $sop]);
    }
    public function create() {
        return view('sop/create');
    }
    public function store(Request $request)
    {
        if ($request->hasFile('file_sop')) {
            $nama_sop=$request->nama_sop;
            $file = $request->file('file_sop');
            $extension = $file->getClientOriginalExtension();
            $filenameWithExtension = $nama_sop . '.' . $extension;
            $path = $file->storeAs('public', $filenameWithExtension); // This will store the file in the "storage/app/public" directory.
            $sop = new sop();
            $sop->nama_sop = $request->nama_sop;
            $sop->file_sop = $filenameWithExtension;
            $sop->save();            

            return redirect('/sop');
        }

        return "No file uploaded.";
    }
}
