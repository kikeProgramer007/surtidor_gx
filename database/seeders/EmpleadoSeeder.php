<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EmpleadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('empleados')->insert([
            [
                'ci' => '12345678',
                'nombre' => 'Juan',
                'paterno' => 'Perez',
                'materno' => 'Gomez',
                'telefono' => '78912345',
                'direccion' => 'Av. Siempre Viva 123',
                'estado' => 1,
                'id_usuario' => 1, // Asegúrate de que exista un usuario con ID 1
            ]
        ]);
    }
}
