<?php

namespace App\Http\Controllers;
use Excel, App\Bom;
use Illuminate\Http\Request;

class BomController extends Controller
{
    public function create() {
        return view('bom/create');
    }
    public function store(Request $request) {
        // Check if a file was uploaded
        if ($request->hasFile('file_excel_bom')) {
        // Get the uploaded file
        $file = $request->file('file_excel_bom');
        // Process the Excel file
        Excel::load($file, function($reader) {

            // Getting all results
            $results = $reader->get();
        
            foreach($results as $result){
                $bom = new bom;
                $bom->fg_name = $result->fg_name;
                $bom->rm_name = $result->rm_name;
                $bom->qty_bom = $result->qty_bom;
                $bom->uom = $result->uom;
                $bom->save();
            }
            });
            return redirect('stok');
        }
        return 'No file uploaded.';
    }

}
