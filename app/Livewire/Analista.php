<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;


class Analista extends Component
{
    public $categoria;
    public $analista_id = [];

    public function mount(){
        $this->analista_id = User::where('rol_id', '2')->get();
        //$this->puestos = collect();
    }
    public function render()
    {
        return view('livewire.analista');
    }
}
