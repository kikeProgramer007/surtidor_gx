<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProveedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('proveedores')->insert([
            [
                'nombre' => 'Proveedor A',
                'telefono' => '72123456',
                'direccion' => 'Zona Industrial 123',
                'estado' => 1,
            ],
            [
                'nombre' => 'Proveedor B',
                'telefono' => '73214567',
                'direccion' => 'Av. Comercial 456',
                'estado' => 1,
            ],
        ]);
    }
}
