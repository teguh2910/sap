<?php

namespace App\Http\Controllers;
use App\detail_prod_g1, App\gudang_satu;
use Illuminate\Http\Request;

class DetailProdG1Controller extends Controller
{
    public function index($id) {
        $detail_prod_g1 = detail_prod_g1::all();
        $gudang_satu = gudang_satu::all();
        if($detail_prod_g1->first()==null)
        {
            foreach($gudang_satu as $gudang_satu)
            {
                $insert_data = new detail_prod_g1;
                $insert_data->id_prod_g1 = $id;
                $insert_data->id_gudang_satu = $gudang_satu->id_gudang_satu;
                $insert_data->category_part = $gudang_satu->category_part;
                $insert_data->save();
            }            

        }
        return view('detail_prod_g1/index',compact('detail_prod_g1','id'));
    }
    public function update_detail_prod_g1(Request $request)
    {
        if($request->ajax()){
            detail_prod_g1::find($request->input('pk'))->update([$request->input('name') => $request->input('value')]);
            return response()->json(['success' => true]);
        }
    }
}
