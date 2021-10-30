<?php

namespace App\Exports;

use App\Models\Beer;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BeersExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Beer::all();
    }

    /**
    * @return Headings
    */
    public function headings(): array {
        return ['id', 'brewery_id', 'abv', 'ibu', 'name', 'style', 'ounces', 'created_at', 'updated_at', 'deleted_at'];
    }
}
