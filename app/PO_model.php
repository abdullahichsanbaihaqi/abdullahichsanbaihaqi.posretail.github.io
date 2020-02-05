<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PO_model extends Model
{
	use SoftDeletes;
	
    protected $table = 'tblinventory';
   	protected $dates = ['deleted_at'];
}
