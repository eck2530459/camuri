<?php

namespace App\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filters\DateFilter;
use Illuminate\Database\Eloquent\Builder;
use Auth;

use App\Models\User;
use App\Models\TicketDetalle;

class TicketTable extends DataTableComponent
{
    //protected $model = TicketDetalle::class;
    public function builder(): Builder
    {
    
        if (Auth::user()->rol_id == 1 || Auth::user()->rol_id == 2 ) {
            return TicketDetalle::query(); // Select some things
    
        }
        else
        return TicketDetalle::join('tickets as t', 't.id', 'ticket_detalles.ticket_id')
        ->join('users as u', 'u.id', 'ticket_detalles.user_id')
        ->where('u.id', Auth::user()->id); // Select some things
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id')
        
       
        ->setTableRowUrl(function($row) {
            return route('ticket.edit', $row);
        });
        $this->setDefaultSort('id', 'desc');
        //$this->emit('setFilter', 'status', '1');
        $this->setRefreshTime(10000);
        //$this->setRefreshVisible(false);
        //$this->setRefreshKeepAlive();
    }

    public function columns(): array
    {
        if (Auth::user()->rol_id == 1 || Auth::user()->rol_id == 2 ) {
            return [
                Column::make("#", "id")
                ->sortable(),
                Column::make("Status", "ticket_detalle.status"),
                Column::make("Categoria", "asunto_detalle.nombre")
                ->searchable()
                ->sortable(),
                Column::make("Observación Usuario", "descripcion"),
                //Column::make("Departamento", "user_detalle.departamento.departamento_id"),
                Column::make("Usuario", "user_detalle.name")
                ->searchable(),
               // Column::make("Categoría", "asunto_detalle.nombre")
                 //   ->sortable(),
                   // Column::make('Descripcion', 'ticket_detalle.descripcion'),
                    //Column::make('User', 'user_detalle.name'),
                Column::make("Fecha", "created_at")
                    ->sortable(),
                //Column::make("Updated at", "updated_at")
                  //  ->sortable(),
                  
            ];
        }
        else
        return [
            Column::make("#", "id")
            ->sortable(),
            Column::make("Status", "ticket_detalle.status"),
            Column::make("Observación Usuario", "descripcion"),
            //Column::make('Active'),
            Column::make("Fecha", "created_at")
                ->sortable(),
            
              
        ];
    }
    public function filters(): array
{
   

    return [
        DateFilter::make('created_at'),
    ];
}
public function bulkActions(): array
{
    return [
        'exportSelected' => 'Export',
    ];
}

}
