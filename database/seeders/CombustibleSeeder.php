<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CombustibleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('combustibles')->insert([
            [
                'nombre' => 'Gasolina Premium',
                'precio' => 6.50,
                'tipo' => 'Gasolina',
                'estado' => 1,
            ],
            [
                'nombre' => 'Gasolina Regular',
                'precio' => 4.50,
                'tipo' => 'Gasolina',
                'estado' => 1,
            ],
            [
                'nombre' => 'Diésel',
                'precio' => 3.80,
                'tipo' => 'Diésel',
                'estado' => 1,
            ],
           /* [
                'nombre' => 'GNV',
                'precio' => 2.50,
                'tipo' => 'Gas Natural',
                'estado' => 1,
            ],
            [
                'nombre' => 'GLP',
                'precio' => 3.00,
                'tipo' => 'Gas Licuado',
                'estado' => 1,
            ],*/
        ]);
    }
}
