<?php

namespace App\Http\Controllers;
use App\stok;
use Illuminate\Http\Request;
use Excel;

class stokController extends Controller
{
    public function index(){
        Excel::load('template_upload_stok.xlsx', function($reader) {

            // Getting all results
            $results = $reader->get();
        
            foreach($results as $result){
                $stok = new stok;
                $stok->part_no = $result->part_no;
                $stok->part_name = $result->part_name;
                $stok->category_part = $result->category;
                $stok->beginning_balance = $result->beginning_balance;
                $stok->incoming_balance = $result->incoming_balance;
                $stok->usage_balance = $result->usage_balance;
                $stok->ending_balance = $result->ending_balance;
                $stok->save();
            }
            dd("Sukses");
        });
        $stoks = stok::with('parts')->get();
        return view('stok.index', compact('stoks'));
    }
}
