<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category_model extends Model
{

	use SoftDeletes;

    protected $table = 'tblcategory';
    protected $fillable = ['CategoryName']; 
   	protected $dates = ['deleted_at'];

   	public function product()
   	{
   		return $this->belongsTo('App/Product_model');
   	}
}
