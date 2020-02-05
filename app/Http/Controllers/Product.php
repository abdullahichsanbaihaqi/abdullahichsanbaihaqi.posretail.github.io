<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product_model;
use App\Category_model;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ProductImport;
use App\Exports\ProductExport;
use Alert;

class Product extends Controller
{
     public function index()
    {
        $product = Product_model::with('get_category')->get();
    	//echo '<pre>'; print_r($product) ;echo '<pre>';die;
    	$data = [
    			'judul' 	=> 'Data Produk', 
    			'product' => $product,
    	];
/*
    Alert::success('pesan yang ingin disampaikan', 'Judul Pesan');*/

    	return view('product/v_product',$data);
    }
    public function add_produk()
    {
        $kategori = Category_model::all();
    	$data = [
    			'judul' 	=> 'Tambah Master Produk',
    			'action' 	=> 'add_product_action',     			
    			'CategoryId' => '',   			
    			'ProductName' => '',         
                'CategoryName' => '',       
                'Price' => '',   					
    			'id' => '',
                'kategori' => $kategori,

    	];
    	return view('product/v_product_form',$data);
    }

    public function add_produk_action(Request $request)
    {
    	//print_r($request);die;
        $message = [
                    'required' => ':attribute harus di isi !!',
        ];
        
        $this->validate($request,[
            'ProductName' => 'required',
            'CategoryId' => 'required',
        ],$message);
    	
        Product_model::create([
			'ProductName' => $request->ProductName,
			'CategoryId' => $request->CategoryId,     
            'Price' => $request->Price,     

		]);

        alert()->success('Berhasil',$request->ProductName. ' Telah di Tambahkan');
		return redirect('/product');
    }
     public function edit_produk($id)
    {
    	$produk = Product_model::with('get_category')->find($id);
    	$get_kategori = Category_model::find($id);
    	$kategori = Category_model::all();
    	$data = [
    			'judul' 	=> 'Ubah Master Produk',
    			'action' 	=> '/product/edit_product_action',   			
    			'ProductName' => $produk->ProductName,    		 			
    			'CategoryName' => $produk->get_category->CategoryName,  			 			
    			'CategoryId' => $produk->CategoryId,   
                'Price' => $produk->Price,     
    			'id' => $produk->id,
    			'kategori' => $kategori,

    	];

    	return view('product/v_product_form',$data);
    }
    public function edit_produk_action(Request $request)
    {
        $message = [
                    'required' => ':attribute harus di isi !!',
        ];
        
        $this->validate($request,[
            'ProductName' => 'required',
            'CategoryId' => 'required',
        ],$message);

    	$produk = Product_model::find($request->id);
        $produk->ProductName = $request->ProductName;
        $produk->CategoryId = $request->CategoryId;   
        $produk->Price = $request->Price;  
        $produk->save();

        alert()->success('Berhasil',$produk->ProductName. ' Telah di Ubah');
		return redirect('/product');
    }
    public function hapus_produk($id)
    {

        $produk = Product_model::find($id);
        $produk->delete();
    }

}
