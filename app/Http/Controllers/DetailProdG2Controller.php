<?php

namespace App\Http\Controllers;
use App\detail_prod_g2, App\gudang_dua;
use Illuminate\Http\Request;

class DetailProdG2Controller extends Controller
{
    public function index($id) {
        $detail_prod_g2 = detail_prod_g2::all();
        $gudang_dua = gudang_dua::all();
        // if($detail_prod_g2->first()==null)
        // {
        //     foreach($gudang_dua as $gudang_dua)
        //     {
        //         $insert_data = new detail_prod_g2;
        //         $insert_data->id_prod_g2 = $id;
        //         $insert_data->id_gudang_dua = $gudang_dua->id_gudang_dua;
        //         $insert_data->category_part = $gudang_dua->category_part;
        //         $insert_data->save();
        //     }            

        // }
        return view('detail_prod_g2/index',compact('detail_prod_g2','id'));
    }
    public function update_detail_prod_g2(Request $request)
    {
        if($request->ajax()){
            detail_prod_g2::find($request->input('pk'))->update([$request->input('name') => $request->input('value')]);
            return response()->json(['success' => true]);
        }
    }
    public function store(Request $request) {
         // Process the form data
        foreach ($request->all() as $key => $value) {
            if (strpos($key, 'id_gudang_dua_') !== false) {
                $index = str_replace('id_gudang_dua_', '', $key);
                $idGudangdua = $request->input("id_gudang_dua_" . $index);
                $qtyProgG2 = $request->input("qty_prod_g2_" . $index);
                $priceG2 = $request->input("price_g2_" . $index);
                $id_prod_g2 = $request->input("id_prod_g2");
                //dd($index);
                // Perform any database operations or other actions here
                // Example: Create a new record in the database
                detail_prod_g2::create([
                    'id_prod_g2' => $id_prod_g2,
                    'id_gudang_dua' => $idGudangdua,
                    'qty_prod_g2' => $qtyProgG2,
                    'price_g2' => $priceG2,
                ]);
            }
        }
        
        $part_fg=gudang_dua::where('category_part','=','FG')->get();
        if($request->submit_fg=='submit_fg'){
            return redirect('/prodg2');
        }
        return view('detail_prod_g2/create_fg',compact('part_fg','id_prod_g2'));
    }
    
}
