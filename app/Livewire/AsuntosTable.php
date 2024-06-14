<?php

namespace App\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Asunto;

class AsuntosTable extends DataTableComponent
{
    protected $model = Asunto::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id')
        
       
        ->setTableRowUrl(function($row) {
            return route('fallas.edit', $row);
        });
        $this->setDefaultSort('id', 'desc');
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
