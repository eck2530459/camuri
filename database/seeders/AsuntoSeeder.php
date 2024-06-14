<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AsuntoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('asuntos')->delete();
        
        \DB::table('asuntos')->insert(array (
            0 => 
            array (
                'nombre' => 'Error de Profit',
                                
            ),         
            1 => 
            array (
                'nombre' => 'Extensión no salen llamadas',
                                
            ),         
            2 => 
            array (
                'nombre' => 'Error de impresora',
                                
            ),         
        ));
    }
}
