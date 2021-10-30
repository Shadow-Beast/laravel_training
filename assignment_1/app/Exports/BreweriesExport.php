<?php

namespace App\Exports;

use App\Models\Brewery;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BreweriesExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Brewery::all();
    }

    /**
    * @return Headings
    */
    public function headings(): array {
        return ['id', 'name', 'city', 'state', 'created_at', 'updated_at', 'deleted_at'];
    }
}
