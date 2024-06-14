<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Rol;


class Role extends Component
{
    public $categoria;
    public $categorias = [];

    public function mount(){
        $this->categorias = Rol::all();
        //$this->puestos = collect();
    }
    public function render()
    {
        return view('livewire.role');
    }
}
