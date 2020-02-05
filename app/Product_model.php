<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product_model extends Model
{
    
	use SoftDeletes;

    protected $table = 'tblproduct';
    protected $fillable = ['ProductName','CategoryId']; 
   	protected $dates = ['deleted_at'];

   public function get_category()
   	{
   		return $this->belongsTo(Category_model::class,'CategoryId','id');
   	}
}
