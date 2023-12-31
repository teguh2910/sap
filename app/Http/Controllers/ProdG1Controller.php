<?php

namespace App\Http\Controllers;
use App\prod_g1, App\produk, App\gudang_satu, Excel, App\detail_prod_g1, App\po_customer, App\part_customer, App\detail_prod_g2;
use Illuminate\Http\Request;

class ProdG1Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    function create() {
        $po_customer = po_customer::all();
        $part_customer = part_customer::all();
        return view('prod_g1/create',compact(['po_customer','part_customer']));
    }
    function store(Request $request) {
        $prod_g1 = new prod_g1;
        $prod_g1->lot_prod_g1 = $request->lot_prod_g1;
        $prod_g1->tgl_prod_g1 = $request->tgl_prod_g1;
        $prod_g1->id_po_customer = $request->id_po_customer;
        //$prod_g1->type = $request->type;
        $prod_g1->save();
        //update stok produk
        // $part_no_produk=produk::find($request->id_produk)->kode_produk;        
        // $total_produk=prod_g1::where('id_produk',$request->id_produk)->sum('qty_prod_g1');        
        // $gudangsatu = gudang_satu::where('part_no',$part_no_produk)->first();
        // $gudangsatu->incoming_balance = $total_produk;
        // $gudangsatu->save();
        $gudangsatu= gudang_satu::where('category_part','RM')->get();
        return view('/detail_prod_g1/create',compact(['prod_g1','gudangsatu']));
    }
    public function index(){
        $prod_g1 = prod_g1::all();
        return view('prod_g1/index',compact(['prod_g1']));
    }
    public function cetak($id){
        $prod_g1=prod_g1::find($id);
        $detail_prod_g1=detail_prod_g1::where('id_prod_g1',$id)->get();
        Excel::load('report_produksi_g1.xlsx', function($excel) use ($prod_g1,$detail_prod_g1) {            
            $excel->sheet('Sheet1', function($sheet) use ($prod_g1,$detail_prod_g1) {                
                // Sheet manipulation
                $sheet->setCellValue('B3', $prod_g1->lot_prod_g1);
                $sheet->setCellValue('D3', $prod_g1->tgl_prod_g1);
                $sheet->setCellValue('F3', $prod_g1->po_customers->first()->no_po_customer);
                //$sheet->setCellValue('H3', $prod_g1->part_customers->first()->part_name);
                $i=7;
                $j=37;
                $k=29;
                foreach($detail_prod_g1 as $d){
                    if($d->gudang_satus->first()->category_part=="RM" && $d->qty_prod_g1 != null){                    
                    foreach($d->gudang_satus as $g){
                        $sheet->setCellValue('B'.$i, $g->part_no);
                        $sheet->setCellValue('C'.$i, $g->part_name);
                    }
                    $sheet->setCellValue('D'.$i, $d->price_g1);
                    $sheet->setCellValue('E'.$i, $d->qty_prod_g1);
                    $i++;
                }elseif($d->gudang_satus->first()->category_part=="FG" && $d->qty_prod_g1 != null){
                    foreach($d->gudang_satus as $g){
                        $sheet->setCellValue('B'.$j, $g->part_no);
                        $sheet->setCellValue('C'.$j, $g->part_name);
                    }
                    $sheet->setCellValue('D'.$j, $d->price_g1);
                    $sheet->setCellValue('E'.$j, $d->qty_prod_g1);
                    $j++;
                }elseif($d->gudang_satus->first()->category_part=="NON_RM" && $d->qty_prod_g1 != null){
                    foreach($d->gudang_satus as $g){
                        $sheet->setCellValue('B'.$k, $g->part_no);
                        $sheet->setCellValue('C'.$k, $g->part_name);
                    }
                    $sheet->setCellValue('D'.$k, $d->price_g1);
                    $sheet->setCellValue('E'.$k, $d->qty_prod_g1);
                    $k++;
                }
                }
            });
        })->export('xlsx');
    }
    public function edit(Request $request,$id) {
        $po_customer = po_customer::all();
        $part_customer = part_customer::all();
        $prod_g1=prod_g1::find($id);
        return view('prod_g1/edit',compact(['po_customer','part_customer','prod_g1','id']));
    }
    public function update(Request $request,$id) {
        $prod_g1 = prod_g1::find($id);
        $prod_g1->lot_prod_g1 = $request->lot_prod_g1;
        $prod_g1->tgl_prod_g1 = $request->tgl_prod_g1;
        $prod_g1->id_po_customer = $request->id_po_customer;
        // $prod_g1->type = $request->type;
        $prod_g1->save();
        //update stok basemetal
        // $part_no_basemetal=basemetal::find($request->id_base_metal)->kode_base_metal;
        // $total_basemetal=prod_g1::where('id_base_metal',$request->id_base_metal)->sum('qty_prod_g1');
        // $gudangsatu = gudang_dua::where('part_no',$part_no_basemetal)->first();
        // $gudangsatu->incoming_balance = $total_basemetal;
        // $gudangsatu->save();
        $gudangsatu= gudang_satu::where('category_part','RM')->get();
        return redirect('prodg1');
    }
    public function delete($id){
        prod_g1::find($id)->delete();
        return redirect('prodg1');
    }
}
