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
