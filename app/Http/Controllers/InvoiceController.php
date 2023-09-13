<?php

namespace App\Http\Controllers;
use App\sj_g1, App\invoice, App\po_customer, App\customer,App\detail_invoice,App\part_customer, Excel, QrCode;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;

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
        // Step 1: Choose a cryptographic algorithm
        $algorithm = 'AES-256-CBC';

        // Step 2: Generate a unique key
        $key = "VISION4000007581"; // 32 bytes (256 bits) key for AES-256
        $data= "VISION|NOINVOICE|123|1234|123456|TAX_NUMBER";
        // Step 3: Encrypt the data
        $qrCodeData = Crypt::encrypt($data, $key, $algorithm);
        $test_decrypt = Crypt::decrypt($qrCodeData, $key, $algorithm);
        // Generate QR code image and save it as a file
        $qrCodeImage = QrCode::format('png')->size(300)->generate($qrCodeData);
        $qrCodeImagePath = public_path('qrcode.png');
        file_put_contents($qrCodeImagePath, $qrCodeImage);
        $invoice=invoice::find($id);
        //$sj_g1=sj_g1::where('id_po_customer',$invoice->id_po_customer)->groupBy('id_gudang_satu')->get();
        //$qty_sj_g1=sj_g1::where('id_po_customer',$invoice->id_po_customer)->groupBy('id_gudang_satu')->sum('qty_sj_g1');
        $d_i=detail_invoice::where('id_invoice',$invoice->id_invoice)->get();
        //dd($sj_g1);
        Excel::load('invoice.xlsx', function ($excel) use ($qrCodeImagePath,$invoice,$d_i) {
            $excel->sheet('sheet1', function ($sheet) use ($qrCodeImagePath,$invoice,$d_i) {
                // Sheet manipulation
                $sheet->setCellValue('B7', $invoice->no_invoice);
                $sheet->setCellValue('B8', $invoice->tgl_invoice);
                $sheet->setCellValue('B9', $invoice->no_fp);
                $sheet->setCellValue('I7', $invoice->po_customers->first()->customers->first()->nama_customer);
                $sheet->setCellValue('I8', $invoice->po_customers->first()->no_po_customer);
                $sheet->setCellValue('I9', $invoice->po_customers->first()->tgl_po_customer);
                $i=13;
                $no=1;
                foreach($d_i as $s){
                    $sheet->setCellValue('A'.$i, $no);
                    $sheet->setCellValue('B'.$i, $s->parts->first()->part_name);
                    $sheet->setCellValue('F'.$i, $s->qty);
                    $sheet->setCellValue('G'.$i, "Kg");
                    $sheet->setCellValue('H'.$i, $s->invoices->first()->po_customers->first()->detail_po_customer->first()->harga_po_customer);
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
        return view('invoice/view',compact(['id','d_i']));
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
