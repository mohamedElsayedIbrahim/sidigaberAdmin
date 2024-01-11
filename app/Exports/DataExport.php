<?php

namespace App\Exports;

use App\Services\AdmissionService;
use Maatwebsite\Excel\Concerns\FromCollection;

class DataExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $data;

    public function __construct(Array $data) {
        $this->data = $data;
    }

    public function collection()
    {

        return $this->data;
    }
}
