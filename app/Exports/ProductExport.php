<?php

namespace App\Exports;

use App\Product_model;
use Maatwebsite\Excel\Concerns\FromCollection;

class ProductExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Product_model::all();
    }
}
