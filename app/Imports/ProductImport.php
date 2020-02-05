<?php

namespace App\Imports;

use App\Inventory_model;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow; 

class ProductImport implements ToModel,  WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Inventory_model([            
            'PONumber'          => $row['nomor_po'],
            'ProductCode'       => $row['kode_barcode'],
            'ProductId'         => $row['kode_produk'],
        ]);
    }
}
