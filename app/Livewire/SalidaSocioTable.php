<?php

namespace App\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\SalidaSocio;

class SalidaSocioTable extends DataTableComponent
{
    protected $model = SalidaSocio::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Portero", "portero")
                ->sortable(),
            Column::make("Entrada", "entrada")
                ->sortable(),
            Column::make("Salida", "salida")
                ->sortable(),
            Column::make("Identificador", "identificador")
                ->sortable(),
            Column::make("Detalle", "detalle")
                ->sortable(),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
        ];
    }
}
