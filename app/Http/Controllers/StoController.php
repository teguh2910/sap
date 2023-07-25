<?php

namespace App\Http\Controllers;
use App\sto, Excel;
use Illuminate\Http\Request;

class StoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function create() {
        return view('stog2/create');
    }
    public function store(Request $request) {
        // Check if a file was uploaded
        if ($request->hasFile('data_excel')) {
        // Get the uploaded file
        $file = $request->file('data_excel');
        // Process the Excel file
        Excel::load($file, function($reader) use($request) {

            // Getting all results
            $results = $reader->get();
        
            foreach($results as $result){
                if($result->part_no == null){
                    break;
                }
                $sto = new sto;
                $sto->part_no = $result->part_no;
                $sto->qty_sto = $result->qty_sto;
                $sto->tgl_sto = $request->tgl_sto;
                $sto->save();
            }
            });
            return redirect('gudangdua');
        }
        return 'No file uploaded.';
    }
}
