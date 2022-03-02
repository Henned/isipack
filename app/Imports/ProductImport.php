<?php

namespace App\Imports;

use App\Models\Product;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

class ProductImport implements ToModel, WithHeadingRow

{
    
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    
    
    public function model(array $row)
    {
        if (!isset($row["artbezeichnung"])) {
            return null;
        }
        return new Product([
            "name"    => $row["artbezeichnung"], 
            "version" => $row["einheit"],
            "slug" => Str::slug($row["artbezeichnung"]),
            "regular_price" => $row["preiskart"],
            "SKU"     => $row["art_nr"],
            'image' => "/storage/img/".$row["image"],
            "category_slug" => Str::slug($row["kategorie"]),
        ]);
    }
}
