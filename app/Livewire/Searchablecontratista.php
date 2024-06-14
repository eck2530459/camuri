<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Contratista;


class Searchablecontratista extends Component
{
   public $showdiv = false;
   public $search = "";
   public $showresult = true;
   public $records;
   public $empDetails;

   // Fetch records
   public function searchResult(){

       if(!empty($this->search)){

           $this->records = Contratista::orderby('nombres','asc')
                     ->select('*')
                     ->where('nombres','like','%'.$this->search.'%')
                     ->orwhere('razon_social','like','%'.$this->search.'%')
                     ->orwhere('rif_cedula','like','%'.$this->search.'%')
                     ->limit(5)
                     ->get();

           $this->showdiv = true;
       }else{
           $this->showdiv = false;
       }
   }

   // Fetch record by ID
   public function fetchEmployeeDetail($id = 0){

       $record = Contratista::select('*')
                   ->where('id',$id)
                   ->first();

       $this->search = $record->name;
       $this->empDetails = $record;
       $this->showdiv = false;
   }
    public function render()
    {
       
        return view('livewire.searchablecontratista');
    }
}
