<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('clientes')->insert([
            [
                'ci' => '11223344',
                'nombre' => 'Carlos',
                'paterno' => 'Medina',
                'materno' => 'Suarez',
                'telefono' => '71122334',
                'correo' => 'carlos.medina@example.com',
                'estado' => 1,
            ],
            [
                'ci' => '44332211',
                'nombre' => 'Ana',
                'paterno' => 'Gutierrez',
                'materno' => 'Ortiz',
                'telefono' => '74433221',
                'correo' => 'ana.gutierrez@example.com',
                'estado' => 1,
            ],
        ]);
    }
}
