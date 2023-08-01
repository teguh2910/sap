<?php

namespace App\Http\Controllers;
use App\prod_g2, App\basemetal, App\material, App\gudang_dua, App\po_customer, App\part_customer, Excel, App\detail_prod_g2;
use Illuminate\Http\Request;

class ProdG2Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function create() {
        $po_customer = po_customer::all();
        $part_customer = part_customer::all();
        return view('prod_g2/create',compact(['po_customer','part_customer']));
    }
    public function store(Request $request) {
        $prod_g2 = new prod_g2;
        $prod_g2->lot_prod_g2 = $request->lot_prod_g2;
        $prod_g2->tgl_prod_g2 = $request->tgl_prod_g2;
        $prod_g2->id_po_customer = $request->id_po_customer;
        // $prod_g2->type = $request->type;
        $prod_g2->save();
        //update stok basemetal
        // $part_no_basemetal=basemetal::find($request->id_base_metal)->kode_base_metal;
        // $total_basemetal=prod_g2::where('id_base_metal',$request->id_base_metal)->sum('qty_prod_g2');
        // $gudangdua = gudang_dua::where('part_no',$part_no_basemetal)->first();
        // $gudangdua->incoming_balance = $total_basemetal;
        // $gudangdua->save();
        $gudangdua= gudang_dua::where('category_part','RM')->get();
        return view('/detail_prod_g2/create',compact(['prod_g2','gudangdua']));
    }
    public function index(){
        $prod_g2 = prod_g2::all();
        return view('prod_g2/index',compact(['prod_g2']));
    }
    public function cetak($id){
        $prod_g2=prod_g2::find($id);
        $detail_prod_g2=detail_prod_g2::where('id_prod_g2',$id)->get();
        Excel::load('report_produksi.xlsx', function($excel) use ($prod_g2,$detail_prod_g2) {            
            $excel->sheet('Sheet1', function($sheet) use ($prod_g2,$detail_prod_g2) {                
                // Sheet manipulation
                $sheet->setCellValue('B3', $prod_g2->lot_prod_g2);
                $sheet->setCellValue('D3', $prod_g2->tgl_prod_g2);
                $sheet->setCellValue('F3', $prod_g2->po_customers->first()->no_po_customer);
                $sheet->setCellValue('H3', $prod_g2->part_customers->first()->part_name);
                $i=7;
                $j=29;
                foreach($detail_prod_g2 as $d){
                    if($d->category_part=="RM" && $d->qty_prod_g2 != null){                    
                    foreach($d->gudang_duas as $g){
                        $sheet->setCellValue('B'.$i, $g->part_no);
                        $sheet->setCellValue('C'.$i, $g->part_name);
                    }
                    $sheet->setCellValue('D'.$i, $d->price_g2);
                    $sheet->setCellValue('E'.$i, $d->qty_prod_g2);
                    $i++;
                }elseif($d->category_part=="FG" && $d->qty_prod_g2 != null){
                    foreach($d->gudang_duas as $g){
                        $sheet->setCellValue('B'.$j, $g->part_no);
                        $sheet->setCellValue('C'.$j, $g->part_name);
                    }
                    $sheet->setCellValue('D'.$j, $d->price_g2);
                    $sheet->setCellValue('E'.$j, $d->qty_prod_g2);
                }
                }
            });
        })->export('xls');
    }    
}
