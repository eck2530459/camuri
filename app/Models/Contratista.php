<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contratista extends Model
{
    use HasFactory;
    use Search; // Use the search trait we created earlier
        
    /* --- existing code here --- */

    protected $searchable = [
        'nombres',
        'razon_social'
      
    ];
}
