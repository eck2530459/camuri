<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Departamento;
use App\Models\User;

class Selectcomponent extends Component
{
    public $clients; public $contacts; public $clientId; public $contactId;
    public function mount()
    {
        $this->clients = Departamento::all();
        $this->getContacts();
     
    }
    public function updatedClientId(){
        $this->getContacts();
    }

    public function getContacts(){
        if ($this->clientId != '') {
            $this->contacts = User::where('departamento_id', $this->clientId)->get();
        }else{
            $this->contacts =[];
        }

    }

    public function render()
    {

        return view('livewire.selectcomponent');
    }
   /* public $mercado, $puesto;
    public $mercados = [], $puestos =[];

    public function mount(){
        $this->mercados = Departamento::all();
        $this->puestos = collect();
    }

    public function updatedMercado($value){
        $this->puestos = User::where('departamento_id', $value)->where('rol_id', '!=', 'NULL')->get();
        $this->puesto = $this->puestos->first()->id ?? null;
    }
    public function render()
    {
        return view('livewire.selectcomponent');
    }*/
}
