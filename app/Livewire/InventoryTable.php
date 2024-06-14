<?php

namespace App\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Inventario;
use Illuminate\Database\Eloquent\Builder;
use Auth;

class InventoryTable extends DataTableComponent
{
    //protected $model = Inventario::class;
    public function builder(): Builder
    {
    
        if (Auth::user()->rol_id == 1 || Auth::user()->rol_id == 2 ) {
            return Inventario::query(); // Select some things
    
        }
        else
        return Inventario::join('tickets as t', 't.id', 'ticket_detalles.ticket_id')
        ->join('users as u', 'u.id', 'ticket_detalles.user_id')
        ->where('u.id', Auth::user()->id); // Select some things
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id') ->setTableRowUrl(function($row) {
            return route('inventario.edit', $row);
        });
        $this->setPerPageAccepted([5, 25, 50, 100]);
        $this->setPerPage(5);
       
    }

    public function columns(): array
    {
        
        return [
         
            Column::make("Id", "id")
            ->sortable(),            
            Column::make("Status", "status")
            ->sortable(),
            Column::make("Categoría", "hardware_detalle.descripcion")
            ->sortable()->searchable(),
            Column::make("Marca", "marca_detalle.descripcion")
            ->sortable()->searchable(),
            Column::make("Modelo", "modelo")
                ->sortable()->searchable(),
            Column::make("Descripcion", "descripcion")
                ->sortable(),
            Column::make("Cantidad	", "cantidad	")
                ->sortable()->searchable(),
            Column::make("Fecha", "created_at")
                ->sortable(),
            
        ];
    }
}
