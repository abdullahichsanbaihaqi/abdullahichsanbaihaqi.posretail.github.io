<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataProduk extends Controller
{
    public function index()
    {
    	$dataproduk = DB::table('tblinventory as i')->select('i.*','p.ProductName',DB::raw('count(i.id) as total'))
    					->join('tblproduct as p','p.id','=','i.ProductId')
    					->groupBy('i.ProductId')->get();
    	$data = [
    				'judul' 	 => 'Data Produk',
    				'dataproduk' => $dataproduk
    		];

    	return view('dataproduk/v_dataproduk',$data);
    }
}
