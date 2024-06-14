<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'name' => 'Admin',
                'last_name' => 'Admin',
                'cargo' => 'Admin',
                'departamento_id' => 1,
                'rol_id' => 1,
                'created_at' => '2022-10-20 10:59:28',
                'updated_at' => '2022-10-20 10:59:28',
                'email' => 'admin@gmail.com',
                'email_verified_at' => '2022-10-20 10:59:28',
                'password' => '$2y$12$0JuAoQy3qAPXWwqR6x4jSOH6pQJ38c8JFyYDRP7frYuZkWfZZWyOS',
                'remember_token' => 'KdCdbMyEqSkCORcKlzz9yC8Sjf7tU4YPotoGB2vvrTf3RD4LlglxMcsJq4tD',
            ),         
            1 => 
            array (
                'name' => 'Pedrito',
                'last_name' => 'Peréz',
                'cargo' => 'Admin',
                'departamento_id' => 2,
                'rol_id' => 3,
                'created_at' => '2022-10-20 10:59:28',
                'updated_at' => '2022-10-20 10:59:28',
                'email' => 'tesoreria@gmail.com',
                'email_verified_at' => '2022-10-20 10:59:28',
                'password' => '$2y$12$0JuAoQy3qAPXWwqR6x4jSOH6pQJ38c8JFyYDRP7frYuZkWfZZWyOS',
                'remember_token' => 'KdCdbMyEqSkCORcKlzz9yC8Sjf7tU4YPotoGB2vvrTf3RD4LlglxMcsJq4tD',
            ),         
            2 => 
            array (
                'name' => 'Enrique',
                'last_name' => 'Caceres',
                'cargo' => 'Analista de Sistemas',
                'departamento_id' => 1,
                'rol_id' => 2,
                'created_at' => '2022-10-20 10:59:28',
                'updated_at' => '2022-10-20 10:59:28',
                'email' => 'analista@gmail.com',
                'email_verified_at' => '2022-10-20 10:59:28',
                'password' => '$2y$12$0JuAoQy3qAPXWwqR6x4jSOH6pQJ38c8JFyYDRP7frYuZkWfZZWyOS',
                'remember_token' => 'KdCdbMyEqSkCORcKlzz9yC8Sjf7tU4YPotoGB2vvrTf3RD4LlglxMcsJq4tD',
            ),         
        ));
    }
}
