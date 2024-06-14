<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Departamento;


class Dept extends Component
{
    public $categoria;
    public $categorias = [];

    public function mount(){
        $this->categorias = Departamento::all();
        //$this->puestos = collect();
    }
    public function render()
    {
        return view('livewire.dept');
    }
}
