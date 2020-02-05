<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\PO_model;

class PO extends Controller
{
    public function index()
    {
    	$po = DB::table('tblinventory')->select('*',DB::raw('count(id) as total'))->groupBy('PONumber')->get();
    	$data = [
    				'po' => $po,
    				'judul' => 'Daftar PO'

    			];
    	return view('po/v_po',$data);
    }
}
