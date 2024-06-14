<?php

namespace App\Livewire;
use Auth;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Illuminate\Database\Eloquent\Builder;
use App\Models\User;

class UserTable extends DataTableComponent
{
    //protected $model = User::class;
    public function builder(): Builder
{

    if (Auth::user()->rol_id == 1 || Auth::user()->rol_id == 2 ) {
        return User::query(); // Select some things

    }
    else
    return User::where('users.id', Auth::user()->id); // Select some things
}

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Nombres", "name")
                ->sortable()->searchable(),
            Column::make("Apellidos", "last_name")
                ->sortable()->searchable(),
            Column::make("Email", "email")
                ->sortable(),
            Column::make("Cargo", "cargo")
                ->sortable(),
            Column::make("Departamento", "departamento.nombre")
                ->sortable(),

        ];
    }

   
}
