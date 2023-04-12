<?php

namespace App\Exports;

use App\Models\FormModel;
use Maatwebsite\Excel\Concerns\FromCollection;

class CalonMahasiswaExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return FormModel::all();
    }
}
