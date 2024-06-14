<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\{Importable, ToModel, WithHeadingRow, WithValidation};

class UsersImport implements ToModel, WithHeadingRow
{
    use Importable;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'name' => $row['name'],
            'last_name' => $row['last_name'],
            'cargo' => $row['cargo'],
            'email' => $row['email'],
            'password' => $row['password'],
            'rol_id' => $row['rol_id'],
            'departamento_id' => $row['departamento_id'],
            'remember_token' => $row['remember_token'],            
        ]);
    }
}
