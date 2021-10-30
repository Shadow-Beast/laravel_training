<?php

namespace App\Imports;

use App\Models\Beer;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BeersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if($row['ibu'] != null) {
            return new Beer([            
                'brewery_id'    => $row['brewery_id'], 
                'abv'           => $row['abv'], 
                'ibu'           => $row['ibu'], 
                'name'          => $row['name'],
                'style'         => $row['style'],
                'ounces'        => $row['ounces'],
            ]);
        }
        else {
            return new Beer([            
                'brewery_id'    => $row['brewery_id'], 
                'abv'           => $row['abv'], 
                'name'          => $row['name'],
                'style'         => $row['style'],
                'ounces'        => $row['ounces'],
            ]);
        }        
    }
}
