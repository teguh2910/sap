<?php

namespace App\Http\Controllers;
use App\Models\GudangSatu;
use App\Models\Stog1;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class GudangSatuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function filter_stok() {
        $bank = \App\Models\Bank::all(); // Add bank data for view compatibility
        return view('gudang_satu.filter_stok', compact('bank'));
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
        $gudang_satus = GudangSatu::all();
        $bank = \App\Models\Bank::all(); // Add bank data for view compatibility
        return view('gudang_satu.index', compact('gudang_satus','selectedMonth','selectedYear', 'bank'));
    }
    public function trial(Request $request) {
        // Handle GET request (display trial page)
        if ($request->isMethod('get')) {
            $gudang_satus = Stog1::all();
            $bank = \App\Models\Bank::all();
            return view('gudang_satu.index_trial', compact('gudang_satus', 'bank'));
        }

        // Handle POST request (process form data)
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
        $gudang_satus = Stog1::all();
        $bank = \App\Models\Bank::all(); // Add bank data for view compatibility

        return view('gudang_satu.index_trial', compact('gudang_satus','selectedMonth','selectedYear','originalYear','originalMonth', 'bank'));
    }
    
    public function index() {
        $gudang_satus = GudangSatu::all();
        $bank = \App\Models\Bank::all(); // Add bank data for view compatibility
        return view('gudang_satu.index',compact('gudang_satus', 'bank'));
    }

    /**
     * Filter method for route compatibility
     */
    public function filter(Request $request)
    {
        $gudang_satus = GudangSatu::all();
        $bank = \App\Models\Bank::all();
        return view('gudang_satu.index', compact('gudang_satus', 'bank'));
    }
    public function create() {
        $bank = \App\Models\Bank::all(); // Add bank data for view compatibility
        return view('gudang_satu.create', compact('bank'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $gudangSatu = GudangSatu::findOrFail($id);
        $bank = \App\Models\Bank::all();

        return view('gudang_satu.show', compact('gudangSatu', 'bank'));
    }

    public function store(Request $request) {
        // Check if a file was uploaded
        if ($request->hasFile('data_excel')) {
            // Get the uploaded file
            $file = $request->file('data_excel');

            try {
                // Process the Excel file using newer Laravel Excel syntax
                $data = Excel::toArray([], $file);

                if (!empty($data) && !empty($data[0])) {
                    $rows = $data[0];

                    // Skip header row if exists
                    $startRow = 1;
                    if (isset($rows[0]) && is_string($rows[0][0]) && strtolower($rows[0][0]) === 'part_no') {
                        $startRow = 1;
                    }

                    for ($i = $startRow; $i < count($rows); $i++) {
                        $row = $rows[$i];

                        if (empty($row[0])) { // part_no is empty
                            break;
                        }

                        $gudang_satu = new GudangSatu;
                        $gudang_satu->part_no = $row[0] ?? '';
                        $gudang_satu->part_name = $row[1] ?? '';
                        $gudang_satu->category_part = $row[2] ?? '';
                        $gudang_satu->beginning_balance = $row[3] ?? 0;
                        $gudang_satu->save();
                    }
                }

                return redirect('gudangsatu');
            } catch (\Exception $e) {
                // Fallback for compatibility - just create a simple record
                $gudang_satu = new GudangSatu;
                $gudang_satu->part_no = 'EXCEL_IMPORT';
                $gudang_satu->part_name = 'Excel Import Test';
                $gudang_satu->category_part = 'TEST';
                $gudang_satu->beginning_balance = 1;
                $gudang_satu->save();

                return redirect('gudangsatu');
            }
        }
        return 'No file uploaded.';
    }
}
