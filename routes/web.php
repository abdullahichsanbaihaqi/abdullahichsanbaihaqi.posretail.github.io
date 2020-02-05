<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin','Admin@index');
Route::get('/pos','Pos@index');
Route::get('/jasoninventory/{id}','Pos@jasoninventory');

Route::get('/category','Category@index'); 
Route::get('/category/add_category','Category@add_kategori');
Route::post('/category/add_category_action','Category@add_kategori_action');
Route::get('/category/edit_category/{id}','Category@edit_kategori');
Route::post('/category/edit_category_action','Category@edit_kategori_action'); 
Route::delete('delete_kategori/{id}', 'Category@hapus_kategori');

Route::get('/product','Product@index'); 
Route::get('/product/add_product','Product@add_produk'); 
Route::post('/product/add_product_action','Product@add_produk_action'); 
Route::get('/product/edit_product/{id}','Product@edit_produk');
Route::post('/product/edit_product_action','Product@edit_produk_action'); 
Route::delete('delete_product/{id}', 'Product@hapus_produk');

Route::get('/inventory','Inventory@index'); 
Route::get('/inventory/add_inventory','Inventory@add_inventory'); 
Route::post('/inventory/add_inventory_action','Inventory@add_inventory_action'); 
Route::get('/inventory/edit_inventory/{id}','Inventory@edit_inventory');
Route::post('/inventory/edit_inventory_action','Inventory@edit_inventory_action'); 
Route::delete('delete_inventory/{id}', 'Inventory@hapus_inventory');
Route::post('importexcel', 'Inventory@importexcel')->name('importexcel');
Route::get('/export_excel', 'Inventory@export_excel');
Route::get('/download_excel', 'Inventory@download_templateexcel');

Route::get('/po','PO@index');

Route::get('/dataproduk','DataProduk@index');

