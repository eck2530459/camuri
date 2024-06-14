<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Asunto;


class Categorias extends Component
{

    public $categoria;
    public $categorias = [];

    public function mount(){
        $this->categorias = Asunto::all();
        //$this->puestos = collect();
    }

    /*public function updatedMercado($value){
        $this->puestos = MerConcesionario::where('mercado_id', $value)->where('mer_contrato_id', '!=', 'NULL')->get();
        $this->puesto = $this->puestos->first()->id ?? null;
    }
*/

    public function render()
    {
        return view('livewire.categorias');
    }
}
