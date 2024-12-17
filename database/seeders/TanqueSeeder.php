<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TanqueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tanques')->insert([
            [
                'descripcion' => 'Tanque Principal Norte',
                'capacidad' => 50000.00,
                'nivel_actual' => '35000.00',
                'ubicacion' => 'Planta Norte',
                'estado' => 1,
            ],
            [
                'descripcion' => 'Tanque Secundario Sur',
                'capacidad' => 30000.00,
                'nivel_actual' => '20000.00',
                'ubicacion' => 'Planta Sur',
                'estado' => 1,
            ],
            [
                'descripcion' => 'Tanque de Reserva Este',
                'capacidad' => 20000.00,
                'nivel_actual' => '15000.00',
                'ubicacion' => 'Planta Este',
                'estado' => 1,
            ],
            [
                'descripcion' => 'Tanque Auxiliar Oeste',
                'capacidad' => 10000.00,
                'nivel_actual' => '5000.00',
                'ubicacion' => 'Planta Oeste',
                'estado' => 1,
            ],
        ]);
    }
}
