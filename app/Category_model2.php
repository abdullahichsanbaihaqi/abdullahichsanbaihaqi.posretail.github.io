<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category_model extends Model
{
    protected $table = 'tblcategory';
    protected $fillable = ['CategoryName']; 
}
