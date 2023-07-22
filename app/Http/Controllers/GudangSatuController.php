<?php

namespace App\Http\Controllers;
use App\gudang_satu, Excel;
use Illuminate\Http\Request;

class GudangSatuController extends Controller
{
    public function index() {
        $gudang_satus = gudang_satu::all();
        return view('gudang_satu/index',compact('gudang_satus'));
    }
    public function create() {
        return view('gudang_satu/create');
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
                if($result->part_no == null){
                    break;
                }
                $gudang_satu = new gudang_satu;
                $gudang_satu->part_no = $result->part_no;
                $gudang_satu->part_name = $result->part_name;
                $gudang_satu->category_part = $result->category_part;
                $gudang_satu->beginning_balance = $result->beginning_balance;
                $gudang_satu->save();
            }
            });
            return redirect('gudangsatu');
        }
        return 'No file uploaded.';
    }
}
