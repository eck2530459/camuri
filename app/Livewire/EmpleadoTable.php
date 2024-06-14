<?php

namespace App\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Empleado;


class EmpleadoTable extends DataTableComponent
{
    protected $model = Empleado::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id')
        ->setTableRowUrl(function($row) {
            return route('empleados.show', $row);
        });
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Nombres", "nombres")
                ->sortable(),
            Column::make("Apellidos", "apellidos")
                ->sortable(),
            Column::make("Cedula", "cedula")
                ->sortable(),
         
                
            Column::make("Status", "status")
                ->sortable(),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
        ];
    }
}
