<?php

namespace App\Http\Controllers;
use App\detail_prod_g2, App\gudang_dua;
use Illuminate\Http\Request;

class DetailProdG2Controller extends Controller
{
    public function index($id) {
        $detail_prod_g2 = detail_prod_g2::all();
        $gudang_dua = gudang_dua::all();
        if($detail_prod_g2->first()==null)
        {
            foreach($gudang_dua as $gudang_dua)
            {
                $insert_data = new detail_prod_g2;
                $insert_data->id_prod_g2 = $id;
                $insert_data->id_gudang_dua = $gudang_dua->id_gudang_dua;
                $insert_data->category_part = $gudang_dua->category_part;
                $insert_data->save();
            }            

        }
        return view('detail_prod_g2/index',compact('detail_prod_g2','id'));
    }
    public function update_detail_prod_g2(Request $request)
    {
        if($request->ajax()){
            detail_prod_g2::find($request->input('pk'))->update([$request->input('name') => $request->input('value')]);
            return response()->json(['success' => true]);
        }
    }
}
