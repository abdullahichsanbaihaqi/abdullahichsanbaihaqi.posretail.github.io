<?php
 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category_model;
class Category extends Controller
{
    public function index()
    {
    	$kategori = Category_model::all();
    	$data = [
    			'judul' 	=> 'Data Kategori',
    			'kategori' => $kategori
    	];
    	return view('category/v_category',$data);
    }
    public function add_kategori()
    {
    	$data = [
    			'judul' 	=> 'Tambah Master Kategori',
    			'action' 	=> '/category/add_category_action',    			
    			'CategoryName' => '',  			
    			'id' => '',

    	];
    	return view('category/v_category_form',$data);
    }

    public function add_kategori_action(Request $request)
    {
        $message = [
                    'required' => 'Nama Kategori harus di isi !!',
                    'unique'   => ':attribute sudah ada',
        ];
        
        $this->validate($request,[
            'CategoryName' => 'required|unique:tblcategory',
        ],$message);
    	
        Category_model::create([
			'CategoryName' => $request->CategoryName,

		]);

		return redirect('/category');
    }
    public function edit_kategori($id)
    {
    	$kategori = Category_model::find($id);
    	$data = [
    			'judul' 	=> 'Ubah Master Kategori',
    			'action' 	=> '/category/edit_category_action',  
    			'CategoryName' => $kategori->CategoryName,
    			'id' => $kategori->id,

    	];
    	return view('category/v_category_form',$data);
    }
    public function edit_kategori_action(Request $request)
    {
        $message = [
                    'required' => 'Nama Kategori harus di isi !!',
        ];
        
        $this->validate($request,[
            'CategoryName' => 'required',
        ],$message);

    	$kategori = Category_model::find($request->id);
        $kategori->CategoryName = $request->CategoryName;
        $kategori->save();

		return redirect('/category');
    }
    public function hapus_kategori($id)
    {

        $kategori = Category_model::find($id);
        $kategori->delete();
    }
}
