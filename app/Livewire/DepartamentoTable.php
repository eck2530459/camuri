<?php

namespace App\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Departamento;

class DepartamentoTable extends DataTableComponent
{
    protected $model = Departamento::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id')
        ->setTableRowUrl(function($row) {
            return route('departamentos.edit', $row);
        });
        
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
                Column::make("Descripción", "nombre")
                ->searchable(),
                
        ];
    }
}
