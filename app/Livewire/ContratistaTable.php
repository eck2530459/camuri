<?php

namespace App\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Contratista;

class ContratistaTable extends DataTableComponent
{
    protected $model = Contratista::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Estatus", "status")
                ->sortable(),
            Column::make("Nombres", "nombres")
                ->sortable(),
            Column::make("Apellidos", "apellidos")
                ->sortable(),
            Column::make("Rif o cédula", "rif_cedula")
                ->sortable(),
            Column::make("Razón social", "razon_social")
                ->sortable(),
        ];
    }
}
