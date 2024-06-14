<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepertamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('departamentos')->delete();
        
        \DB::table('departamentos')->insert(array (
            0 => 
            array (
                'nombre' => 'Tecnologia y Sistemas',                  
            ),         
            1 => 
            array (
                'nombre' => 'Tesorería',                  
            ),         
            2 => 
            array (
                'nombre' => 'Contabilidad',
            ),         
        ));
    }
}
