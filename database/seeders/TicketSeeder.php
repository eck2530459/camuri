<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      \DB::table('tickets')->delete();
        
        \DB::table('tickets')->insert(array (
            0 => 
            array (
                'status' => 'Abierto',
                'fecha' => '2022-10-22 10:59:28',
                'fecha_rpta' => '2022-10-24 10:59:28',
                'created_at' => '2022-10-20 10:59:28',
                'updated_at' => '2022-10-20 10:59:28',
                                
            ),  
            1 => 
            array (
                'status' => 'Abierto',
                'fecha' => '2022-10-21 10:59:28',
                'fecha_rpta' => '2022-10-29 10:59:28',
                'created_at' => '2022-10-20 10:59:28',
                'updated_at' => '2022-10-20 10:59:28',
                                
            ),  
        ));       
    }
}
