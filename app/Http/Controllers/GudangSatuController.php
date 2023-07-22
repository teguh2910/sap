<?php

namespace App\Http\Controllers;
use App\gudang_satu;
use Illuminate\Http\Request;

class GudangSatuController extends Controller
{
    public function index() : Returntype {
        return view('gudangsatu/index');
    }
}
