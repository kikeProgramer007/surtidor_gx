<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VehiculoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('vehiculos')->insert([
            [
                'codigo_Bsisa' => 'BS123456',
                'placa' => 'ABC-1234',
                'marca' => 'Toyota',
                'color' => 'Blanco',
                'id_cliente' => 1, // Asegúrate de que exista un cliente con ID 1
                'tipo_vehiculo' => 'Sedán',
                'estado' => 1,
            ],
            [
                'codigo_Bsisa' => 'BS654321',
                'placa' => 'XYZ-5678',
                'marca' => 'Nissan',
                'color' => 'Rojo',
                'id_cliente' => 2, // Asegúrate de que exista un cliente con ID 2
                'tipo_vehiculo' => 'Camioneta',
                'estado' => 1,
            ],
            [
                'codigo_Bsisa' => 'BS789123',
                'placa' => 'LMN-9012',
                'marca' => 'Honda',
                'color' => 'Negro',
                'id_cliente' => 1,
                'tipo_vehiculo' => 'Motocicleta',
                'estado' => 1,
            ],
        ]);
    }
}
