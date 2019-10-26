<?php

namespace App\Exports;

use App\Interactions;
use Maatwebsite\Excel\Concerns\FromCollection;

class InteractionsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Interactions::all();
    }
}
