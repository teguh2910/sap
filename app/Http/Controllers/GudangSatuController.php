<?php

namespace App\Http\Controllers;
use App\gudang_satu,App\stog1, Excel;
use Illuminate\Http\Request;

class GudangSatuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function filter_stok() {
        return view('gudang_satu/filter_stok');
    }
    public function post_filter_stok(Request $request) {
        // Get the selected month from the form input
        $selectedDate = $request->input('bulan'); // Assuming 'bulan' is the name of your input field
    
        // Convert the selected date to a DateTime object
        $selectedDateTime = new \DateTime($selectedDate);
    
        // Subtract one month from the selected date
        $selectedDateTime->modify('-1 month');
    
        // Get the month and year after subtracting one month
        $selectedMonth = $selectedDateTime->format('m');
        $selectedYear = $selectedDateTime->format('Y');
        // Filter the data by the month and year
        $gudang_satus = gudang_satu::all();
        return view('gudang_satu/index', compact('gudang_satus','selectedMonth','selectedYear'));
    }
    public function trial(Request $request) {
        // Get the selected month from the form input
        $selectedDate = $request->input('bulan'); // Assuming 'bulan' is the name of your input field
        
        // Convert the selected date to a DateTime object
        $selectedDateTime = new \DateTime($selectedDate);
        $original_input = new \DateTime($selectedDate);
        // Subtract one month from the selected date
        $selectedDateTime->modify('-1 month');
        
        // Get the month and year after subtracting one month
        $selectedMonth = $selectedDateTime->format('m');
        $selectedYear = $selectedDateTime->format('Y');
        $originalMonth = $original_input->format('m');
        $originalYear = $original_input->format('Y');
        // Filter the data by the month and year
        $gudang_satus = stog1::all();
                
        return view('gudang_satu/index_trial', compact('gudang_satus','selectedMonth','selectedYear','originalYear','originalMonth'));
    }
    
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
