<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Inventory_model;
use App\Product_model;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ProductImport;
use App\Exports\ProductExport;
use Alert;
 
class Inventory extends Controller
{
         public function index()
    {
    	$inventory = Inventory_model::with('get_category','get_product')->get();
        $product = Product_model::all();
    	$data = [
    			'judul' 	=> 'Data Inventory',
    			'inventory' => $inventory,
                'product' => $product,             
                'ProductName' => '',                       
                'ProductId' => '', 
                'ProductName' => '', 
                'status' => 'create',   
    	];
/*
    Alert::success('pesan yang ingin disampaikan', 'Judul Pesan');*/

    	return view('inventory/v_inventory',$data);
    }
    public function add_inventory()
    {
        $product = Product_model::all();
    	$data = [
    			'judul' 	=> 'Tambah Produk',
    			'action' 	=> '/inventory/add_inventory_action',     			
    			'ProductCode' => '',   			
    			'ProductName' => '',             
                'ProductId' => '',		 				
    			'id' => '',
                'PONumber' => '', 
                'product' => $product,  
                'status' => 'create',

    	];
    	return view('inventory/v_inventory_form',$data);
    }

    public function add_inventory_action(Request $request)
    {
    	//print_r($request);die;
        $message = [
                    'required' => ':attribute harus di isi !!',
                    'unique'   => ':attribute sudah ada',
        ];
        
        $this->validate($request,[
            'ProductId' => 'required',
            'ProductCode' => 'required|unique:tblinventory',
            'PONumber' => 'required',
        ],$message);
    	
        Inventory_model::create([
			'ProductId' => $request->ProductId,
			'ProductCode' => $request->ProductCode,
			'PONumber' => $request->PONumber,

		]);

        alert()->success('Berhasil',$request->ProductName. ' Telah di Tambahkan');
		return redirect('/inventory');
    }
     public function edit_inventory($id)
    {
    	$inventory = Inventory_model::with('get_product')->find($id);
    	$product = Product_model::all();
    	$data = [
    			'judul' 	=> 'Ubah Kategori',
    			'action' 	=> '/inventory/edit_inventory_action',   			
    			'PONumber' => $inventory->PONumber,    			
    			'ProductCode' => $inventory->ProductCode,  		 			
    			'ProductName' => $inventory->get_product->ProductName,  			 			
    			'ProductId' => $inventory->ProductId,  
    			'id' => $inventory->id,
    			'product' => $product,
                'status' => '',

    	];

    	return view('inventory/v_inventory_form',$data);
    }
    public function edit_inventory_action(Request $request)
    {
        $message = [
                    'required' => ':attribute harus di isi !!',
        ];
        
        $this->validate($request,[
            'ProductId' => 'required',
            'ProductCode' => 'required',
            'PONumber' => 'required',
        ],$message);

        $inventory = Inventory_model::with('get_product')->find($request->id);
    	$inventory = Inventory_model::find($request->id);
        $inventory->PONumber = $request->PONumber;
        $inventory->ProductId = $request->ProductId;
		$inventory->ProductCode = $request->ProductCode;
        $inventory->save();

        alert()->success('Berhasil',$inventory->get_product->ProductName. ' Telah di Ubah');
		return redirect('/inventory');
    }
    public function hapus_inventory($id)
    {

        $inventory = Inventory_model::find($id);
        $inventory->delete();
    }

    public function importexcel(Request $request) 
    {

    /*    Excel::import(new ProductImport(), request()->file('import_file'));
       
        $inventory = DB::table('tblinventory')->where('PONumber',$request->PONumber)->first();
       
        if(isset($inventory->PONumber)){         
            DB::table('tblinventory')->where('PONumber',$request->PONumber)->update([
                'ProductName' => $request->ProductName,
                'CategoryId' => $request->CategoryId,

            ]);
            alert()->success('Berhasil',' Data Telah di Import');
        }else{

            DB::table('tblinventory')->where('CategoryId',999)->delete();
            alert()->info('Gagal',' No PO Tidak ada');   
        }
           
        return redirect('/inventory');*/
        Excel::import(new ProductImport(), request()->file('import_file'));
        alert()->success('Berhasil',' Data Telah di Import');
        return redirect('/inventory');
    }

    public function export_excel()
    {
        return Excel::download(new ProductExport, 'product.xlsx');
    }
    public function download_templateexcel()
    {

       $file = public_path() . '/import/master-product.xlsx';//Mencari file dari model yang sudah dicari
       return response()->download($file); //Download file yang dicari berdasarkan nama file
    }
}
