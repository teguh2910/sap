<?php

namespace App\Http\Controllers;
use App\cashflow, Excel;
use Illuminate\Http\Request;

class CashflowController extends Controller
{
    function index() {
        $cash = cashflow::all();
        return view('cash_flow/index', compact('cash'));
    }
    function create() {
        return view('cash_flow/create');
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
                if($result->bank == null){
                    break;
                }
                $cashflow = new cashflow;
                $cashflow->bank = $result->bank;
                $cashflow->beginning_balance = $result->beginning_balance;
                $cashflow->save();
            }
            });
            return redirect('cashflow');
        }
        return 'No file uploaded.';
    }
}
