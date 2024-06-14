<?php

namespace App\Imports;

use App\Models\SalidaSocio;
use Maatwebsite\Excel\Concerns\{Importable, ToModel, WithHeadingRow, WithValidation};

class SalidasImport implements ToModel, WithHeadingRow
{
    use Importable;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new SalidaSocio([
            'portero' => $row['portero'],
            'entrada' => $row['entrada'],
            'salida' => $row['salida'],
            'identificador' => $row['identificador'],
            'detalle' => $row['detalle'],           
        ]);
    }
}
