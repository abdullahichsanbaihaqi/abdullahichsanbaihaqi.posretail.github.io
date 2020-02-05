<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\PO_model;

class Pos extends Controller
{
    public function index()
    {
    	return view('pos/v_pos');
    }

    public function jasoninventory($barcode)
    {
    	//$data = PO_model::find($barcode);

        $data = DB::table('tblinventory as i')
        		->SELECT('i.*','p.ProductName','p.Price')
        		->join('tblproduct as p','p.id','=','i.ProductId')
        		->where('i.ProductCode',$barcode)->first();
    	return json_encode($data);
    }
}
