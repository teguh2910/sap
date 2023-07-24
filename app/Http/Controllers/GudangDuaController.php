<?php

namespace App\Http\Controllers;
use App\gudang_dua, Excel;
use Illuminate\Http\Request;

class GudangDuaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index() {
        $gudang_duas = gudang_dua::all();
        return view('gudang_dua/index',compact('gudang_duas'));
    }
    public function create() {
        return view('gudang_dua/create');
    }
    public function store(Request $request) {
        // Check if a file was uploaded
        if ($request->hasFile('data_excel')) {
        // Get the uploaded file
        $file = $request->file('data_excel');
        // Process the Excel file
        Excel::load($file, function($reader) {

            // Getting all results
            $results = $reader->get();
        
            foreach($results as $result){
                $gudang_dua = new gudang_dua;
                $gudang_dua->part_no = $result->part_no;
                $gudang_dua->part_name = $result->part_name;
                $gudang_dua->category_part = $result->category_part;
                $gudang_dua->beginning_balance = $result->beginning_balance;
                $gudang_dua->save();
            }
            });
            return redirect('gudangdua');
        }
        return 'No file uploaded.';
    }
}
