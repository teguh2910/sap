<?php

namespace App\Http\Controllers;
use App\sj_g1, App\invoice, App\po_customer, App\customer,App\detail_invoice,App\part_customer, Excel, QrCode;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;
use Carbon\Carbon;

class InvoiceController extends Controller
{
    public function index(){
        $invoice=invoice::all();
        return view('invoice/index',compact(['invoice']));
    }
    public function create(){
        $po_customer=po_customer::all();
        $customer=customer::all();
        return view('invoice/create',compact(['po_customer','customer']));
    }
    public function store(Request $request){
        $invoice = new invoice;
        $invoice->no_invoice = $request->no_invoice;
        $invoice->tgl_invoice = $request->tgl_invoice;
        $invoice->no_fp = $request->no_fp;
        $invoice->id_po_customer = $request->id_po_customer;
        $invoice->save();
        return redirect('invoice');
    }
    
    public function cetak($id)
    {
        // $algorithm = 'AES-128-CBC';
        // $key = "VISION4000007581";
        // $data= "VISION|NOINVOICE|123|1234|123456|TAX_NUMBER";
        // $blockSize = 16;
        // $padding = $blockSize - (strlen($data) % $blockSize);
        // $data .= str_repeat(chr($padding), $padding);
        // $qrCodeData = base64_encode(Crypt::encrypt($data, $key,$algorithm));

        // Step 1: Choose a cryptographic algorithm
        $algorithm = 'AES-128-CBC';

        // Step 2: Generate a unique key and IV
        $key = "VISION4000007581"; // Replace with your actual AES key
        $iv = "VISION4000007581";   // Replace with your actual IV
        $invoice=invoice::find($id);
        $po_c=invoice::select('id_po_customer')->where('id_invoice',$id)->first();
        $invoice_data = \DB::table('detail_invoices')
                        ->join('invoices', 'invoices.id_invoice', '=', 'detail_invoices.id_invoice')
                        ->join('po_customers', 'po_customers.id_po_customer', '=', 'invoices.id_po_customer')
                        ->join('part_customers', 'part_customers.part_number', '=', 'detail_invoices.part')
                        ->join('detail_po_customers', 'detail_po_customers.id_part_customer', '=', 'part_customers.id_part_customer')
                        ->select(
                            'detail_invoices.*',
                            \DB::raw('detail_invoices.qty * detail_po_customers.harga_po_customer as amount')
                        )
                        ->where('detail_invoices.id_invoice', $id)
                        ->where('detail_po_customers.id_po_customer', $po_c->id_po_customer)
                        ->get();

        $amountSum = $invoice_data->sum('amount');
        $ppn=$amountSum*11/100;
        $total_invoice_amount=$amountSum+$ppn;
        //dd($amountSum);

        $data = "VISION|".$invoice->no_invoice."|$amountSum|$ppn|$total_invoice_amount|".$invoice->no_fp;
        //dd($data);
        // Step 3: Encrypt the data
        $encryptedData = openssl_encrypt($data, $algorithm, $key, OPENSSL_RAW_DATA, $iv);

        // Convert the encrypted binary data to BASE64 format
        $qrCodeData = base64_encode($encryptedData);        
        
        // Generate QR code image and save it as a file
        $qrCodeImage = QrCode::format('png')->size(300)->generate($qrCodeData);
        $qrCodeImagePath = public_path('qrcode.png');
        file_put_contents($qrCodeImagePath, $qrCodeImage);
        
        //$sj_g1=sj_g1::where('id_po_customer',$invoice->id_po_customer)->groupBy('id_gudang_satu')->get();
        //$qty_sj_g1=sj_g1::where('id_po_customer',$invoice->id_po_customer)->groupBy('id_gudang_satu')->sum('qty_sj_g1');
        $d_i=detail_invoice::where('id_invoice',$invoice->id_invoice)->get();
        //dd($sj_g1);
        $date = Carbon::parse($invoice->po_customers->first()->tgl_po_customer);  
        $date_invoice = Carbon::parse($invoice->tgl_invoice);
        
        $test=\DB::table('detail_invoices')
        ->join('invoices','invoices.id_invoice','=','detail_invoices.id_invoice')
        ->join('po_customers','po_customers.id_po_customer','=','invoices.id_po_customer')
        ->join('part_customers','part_customers.part_number','=','detail_invoices.part')
        ->join('detail_po_customers','detail_po_customers.id_part_customer','=','part_customers.id_part_customer')
        ->where('detail_invoices.id_invoice',$id)
        ->where('detail_po_customers.id_po_customer',$po_c->id_po_customer)       
        ->get();
        Excel::load('invoice.xlsx', function ($excel) use ($qrCodeImagePath,$invoice,$d_i,$date,$date_invoice,$test) {
            $excel->sheet('sheet1', function ($sheet) use ($qrCodeImagePath,$invoice,$d_i,$date,$date_invoice,$test) {
                // Sheet manipulation
                $sheet->setCellValue('B7', $invoice->no_invoice);
                $sheet->setCellValue('B8', $date_invoice->format('F jS, Y'));
                $sheet->setCellValue('B9', $invoice->no_fp);
                $sheet->setCellValue('H7', $invoice->po_customers->first()->customers->first()->nama_customer);
                $sheet->setCellValue('H8', $invoice->po_customers->first()->no_po_customer);
                $sheet->setCellValue('H9', $date->format('F jS, Y'));
                $sheet->setBorder('J13:J19', 'thin');
                $i=13;
                $no=1;
                foreach($test as $s){
                    $sheet->setCellValue('A'.$i, $no);
                    $sheet->setCellValue('B'.$i, $s->part_name);
                    $sheet->setCellValue('F'.$i, $s->qty);
                    $sheet->setCellValue('G'.$i, "Kg");
                    $sheet->setCellValue('H'.$i, $s->harga_po_customer);
                    $i++;
                    $no++;                    
                }
                $drawing = new \PHPExcel_Worksheet_Drawing();
                $drawing->setName('QR Code');
                $drawing->setDescription('QR Code');
                $drawing->setPath($qrCodeImagePath);
                $drawing->setCoordinates('A31');
                $drawing->setWidthAndHeight(100, 100);
                $drawing->setWorksheet($sheet);
            });
        })->export('xlsx');

        // After exporting the Excel file, you can optionally delete the temporary QR code image file.
        unlink($qrCodeImagePath);
    }
    public function edit($id){
        $invoice=invoice::find($id);
        $po_customer=po_customer::all();
        $customer=customer::all();
        return view('invoice/edit',compact(['invoice','po_customer','customer']));
    }
    public function update(Request $request,$id){
        $invoice=invoice::find($id);
        $invoice->no_invoice = $request->no_invoice;
        $invoice->tgl_invoice = $request->tgl_invoice;
        $invoice->no_fp = $request->no_fp;
        $invoice->id_po_customer = $request->id_po_customer;
        $invoice->save();
        return redirect('invoice');
    }
    public function delete($id){
        $invoice=invoice::find($id);
        $invoice->delete();
        return redirect('invoice');
    }
    public function view($id){
        $d_i=detail_invoice::where('id_invoice',$id)->get();
        $po_c=invoice::select('id_po_customer')->where('id_invoice',$id)->first();
        $test=\DB::table('detail_invoices')
        ->join('invoices','invoices.id_invoice','=','detail_invoices.id_invoice')
        ->join('po_customers','po_customers.id_po_customer','=','invoices.id_po_customer')
        ->join('part_customers','part_customers.part_number','=','detail_invoices.part')
        ->join('detail_po_customers','detail_po_customers.id_part_customer','=','part_customers.id_part_customer')
        ->where('detail_invoices.id_invoice',$id)
        ->where('detail_po_customers.id_po_customer',$po_c->id_po_customer)       
        ->get();
        //dd($test);
        return view('invoice/view',compact(['id','d_i','test']));
    }
    public function detail_create($id){
        $part=part_customer::all();
        return view('invoice/create_detail',compact(['id','part']));
    }
    public function store_detail_create($id){
        $detail_invoice = new detail_invoice;
        $detail_invoice->id_invoice = $id;
        $detail_invoice->part = request('part');
        $detail_invoice->qty = request('qty');
        $detail_invoice->tgl = request('tgl');
        $detail_invoice->save();
        return redirect('invoice/view/'.$id);        
    }
}
