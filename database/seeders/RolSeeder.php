<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('rols')->delete();
        
        \DB::table('rols')->insert(array (
            0 => 
            array (
                'nombre' => 'Administrador',                
            ),         
            1 => 
            array (
                'nombre' => 'Analista',                
            ),         
            2 => 
            array (
                'nombre' => 'Usuario',                
            ),         
        ));
    }
}
