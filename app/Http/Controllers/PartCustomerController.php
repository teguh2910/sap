<?php

namespace App\Http\Controllers;
use App\part_customer, Excel;
use Illuminate\Http\Request;

class PartCustomerController extends Controller
{
    public function index()
    {
        $part_customer = part_customer::all();
        return view('part_customer.index', compact('part_customer'));
    }
    public function create()
    {
        return view('part_customer.create');
    }
    public function store(Request $request){
        $part_customer = new part_customer;
        $part_customer->part_number = $request->part_number;
        $part_customer->part_name = $request->part_name;
        $part_customer->save();
        return redirect('/part_customer');
    }
    public function edit($id)
    {
        $part_customer = part_customer::find($id);
        return view('part_customer.edit', compact('part_customer'));
    }
    public function update(Request $request, $id)
    {
        $part_customer = part_customer::find($id);
        $part_customer->part_number = $request->part_number;
        $part_customer->part_name = $request->part_name;
        $part_customer->save();
        return redirect('/part_customer');
    }
    public function delete($id){
        $part_customer = part_customer::find($id);
        $part_customer->delete();
        return redirect('/part_customer');
    }
    public function create_upload()
    {
        return view('part_customer.create_upload');
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
                    $part_customer = new part_customer;
                    $part_customer->part_number = $result->part_number;
                    $part_customer->part_name = $result->part_name;
                    $part_customer->save();
                }
                });
                return redirect('part_customer');
            }
            return 'No file uploaded.';
        }
}
