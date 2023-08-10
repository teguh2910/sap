<?php

namespace App\Http\Controllers;
use App\part_supplier, Excel;
use Illuminate\Http\Request;

class PartSupplierController extends Controller
{
    public function index()
    {
        $part_supplier = part_supplier::all();
        return view('part_supplier.index', compact('part_supplier'));
    }
    public function create()
    {
        return view('part_supplier.create');
    }
    public function store(Request $request){
        $part_supplier = new part_supplier;
        $part_supplier->part_number = $request->part_number;
        $part_supplier->part_name = $request->part_name;
        $part_supplier->save();
        return redirect('/part_supplier');
    }
    public function edit($id)
    {
        $part_supplier = part_supplier::find($id);
        return view('part_supplier.edit', compact('part_supplier'));
    }
    public function update(Request $request, $id)
    {
        $part_supplier = part_supplier::find($id);
        $part_supplier->part_number = $request->part_number;
        $part_supplier->part_name = $request->part_name;
        $part_supplier->save();
        return redirect('/part_supplier');
    }
    public function delete($id){
        $part_supplier = part_supplier::find($id);
        $part_supplier->delete();
        return redirect('/part_supplier');
    }
    public function create_upload()
    {
        return view('part_supplier.create_upload');
    }
    public function store_upload(Request $request){
          // Check if a file was uploaded
          if ($request->hasFile('data_excel')) {
            // Get the uploaded file
            $file = $request->file('data_excel');
            
            // Process the Excel file
            Excel::load($file, function($reader) {
                // Getting all results
                $results = $reader->get();
                foreach($results as $result){                    
                    $part_supplier = new part_supplier;
                    $part_supplier->part_number = $result->part_number;
                    $part_supplier->part_name = $result->part_name;
                    $part_supplier->save();
                }
                });
                return redirect('part_supplier');
            }
            return 'No file uploaded.';
        }
}
