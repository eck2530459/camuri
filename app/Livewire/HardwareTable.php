<?php

namespace App\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Hardware;

class HardwareTable extends DataTableComponent
{
    protected $model = Hardware::class;

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
            Column::make("Descripción", "descripcion")
                ->sortable(),
           
        ];
    }
}
