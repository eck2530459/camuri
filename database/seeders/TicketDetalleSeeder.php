<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TicketDetalleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('ticket_detalles')->delete();
        
        \DB::table('ticket_detalles')->insert(array (
            0 => 
            array (
                'descripcion' => 'No puedo abrir las carpetas de Profit me sale sin conexion',
                'respuesta' => 'Solc',
                'imagen' => '',
                'asunto_id' => 1,
                'analista_id' => 3,
                'user_id' => 2,
                'ticket_id' => 1,
                'created_at' => '2022-10-20 10:59:28',
                'updated_at' => '2022-10-20 10:59:28',
                                
            ),  
            1 => 
            array (
                'descripcion' => 'La impresora no quiere encender',
                'respuesta' => 'Solc',
                'imagen' => '',
                'asunto_id' => 3,
                'analista_id' => 3,
                'user_id' => 2,
                'ticket_id' => 2,
                'created_at' => '2022-10-20 10:59:28',
                'updated_at' => '2022-10-20 10:59:28',
                                
            ),  
        ));   
    }
}
