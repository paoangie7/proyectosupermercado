<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProveedoresSeeder extends Seeder
{
    public function run()
    {
        DB::table('proveedores')->insert([
            ['nombre' => 'Distribuidora La Paz', 'telefono' => '76543210', 'direccion' => 'Calle Principal 123'],
            ['nombre' => 'Carnes El Campo', 'telefono' => '76512345', 'direccion' => 'Av. Central 456'],
            ['nombre' => 'Bebidas Bolivia', 'telefono' => '78965412', 'direccion' => 'Calle Los Pinos 789'],
            ['nombre' => 'Snacks Express', 'telefono' => '74185296', 'direccion' => 'Av. Libertad 321'],
            ['nombre' => 'Panadería San Juan', 'telefono' => '71234567', 'direccion' => 'Calle 8 de Diciembre 654'],
        ]);
    }
}
