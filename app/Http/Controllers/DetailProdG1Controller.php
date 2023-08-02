<?php

namespace App\Http\Controllers;
use App\detail_prod_g1, App\gudang_satu;
use Illuminate\Http\Request;

class DetailProdG1Controller extends Controller
{
    public function index($id) {
        $detail_prod_g1 = detail_prod_g1::all();
        $gudang_satu = gudang_satu::all();
        // if($detail_prod_g1->first()==null)
        // {
        //     foreach($gudang_satu as $gudang_satu)
        //     {
        //         $insert_data = new detail_prod_g1;
        //         $insert_data->id_prod_g1 = $id;
        //         $insert_data->id_gudang_satu = $gudang_satu->id_gudang_satu;
        //         $insert_data->category_part = $gudang_satu->category_part;
        //         $insert_data->save();
        //     }            

        // }
        return view('detail_prod_g1/index',compact('detail_prod_g1','id'));
    }
    public function update_detail_prod_g1(Request $request)
    {
        if($request->ajax()){
            detail_prod_g1::find($request->input('pk'))->update([$request->input('name') => $request->input('value')]);
            return response()->json(['success' => true]);
        }
    }
    public function store(Request $request) {
        // Process the form data
       foreach ($request->all() as $key => $value) {
           if (strpos($key, 'id_gudang_satu_') !== false) {
               $index = str_replace('id_gudang_satu_', '', $key);
               $idGudangsatu = $request->input("id_gudang_satu_" . $index);
               $qtyProgG1 = $request->input("qty_prod_g1_" . $index);
               $priceG1 = $request->input("price_g1_" . $index);
               $id_prod_g1 = $request->input("id_prod_g1");
               //dd($index);
               // Perform any database operations or other actions here
               // Example: Create a new record in the database
               detail_prod_g1::create([
                   'id_prod_g1' => $id_prod_g1,
                   'id_gudang_satu' => $idGudangsatu,
                   'qty_prod_g1' => $qtyProgG1,
                   'price_g1' => $priceG1,
               ]);
           }
       }        
       $part_fg=gudang_satu::where('category_part','=','FG')->get();
       $non_rm = gudang_satu::where('category_part','=','NON_RM')->get();
       if($request->submit_fg=='submit_fg'){
           return redirect('/prodg1');
       }elseif($request->submit_rm=='submit_rm'){
           return view('detail_prod_g1/create_non_rm',compact('part_fg','id_prod_g1','non_rm','id_prod_g1'));
       }elseif($request->non_rm_submit=='non_rm_submit'){
       return view('detail_prod_g1/create_fg',compact('part_fg','id_prod_g1','non_rm','id_prod_g1'));
    }
   }
}
