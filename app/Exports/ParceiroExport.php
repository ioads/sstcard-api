<?php

namespace App\Exports;

use App\Models\Parceiro;
use Maatwebsite\Excel\Concerns\FromCollection;

class ParceiroExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Parceiro::all();
    }
}
