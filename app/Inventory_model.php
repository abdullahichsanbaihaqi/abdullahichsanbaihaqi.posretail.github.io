<?php
 
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inventory_model extends Model
{ 
    
       
	use SoftDeletes;

    protected $table = 'tblinventory';
    protected $fillable = ['ProductCode','ProductId','PONumber']; 
   	protected $dates = ['deleted_at'];

   	public function get_category()
   	{
   		return $this->belongsTo(Category_model::class,'CategoryId','id');
   	}

   	public function get_product()
   	{
   		return $this->belongsTo(Product_model::class,'ProductId','id');
   	}
}
