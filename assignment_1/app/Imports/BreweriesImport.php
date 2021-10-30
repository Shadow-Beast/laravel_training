<?php

namespace App\Imports;

use App\Models\Brewery;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BreweriesImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Brewery([
            'name'     => $row['name'],
            'city'    => $row['city'], 
            'state'    => $row['state'], 
        ]);
    }
}
