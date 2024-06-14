<?php

namespace App\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Marcahw;

class MarcasHwTable extends DataTableComponent
{
    protected $model = Marcahw::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setPerPageAccepted([5, 25, 50, 100]);
        $this->setPerPage(5);
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Nombre de la Marca", "descripcion"),
            
            
        ];
    }
}
