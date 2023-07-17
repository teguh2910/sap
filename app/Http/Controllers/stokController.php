<?php

namespace App\Http\Controllers;
use App\stok;
use Illuminate\Http\Request;
use Excel;

class stokController extends Controller
{
    public function index(){        
        $stoks = stok::all();
        return view('stok.index', compact('stoks'));
    }
    public function create() {
        return view('stok/create');
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
                $stok = new stok;
                $stok->part_no = $result->part_no;
                $stok->part_name = $result->part_name;
                $stok->category_part = $result->category;
                $stok->beginning_balance = $result->beginning_balance;
                $stok->save();
            }
            });
            return redirect('stok');
        }
        return 'No file uploaded.';
    }
}