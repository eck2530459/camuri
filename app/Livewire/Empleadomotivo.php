<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\MotivoEntrada;

class Empleadomotivo extends Component
{
    //public $categoria;
    public $motivo = [];

    public function mount(){
        $this->motivo = MotivoEntrada::all();
    }
    public function render()
    {
        return view('livewire.empleadomotivo');
    }
}
