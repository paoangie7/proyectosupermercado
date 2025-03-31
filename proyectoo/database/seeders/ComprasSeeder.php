<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ComprasSeeder extends Seeder
{
    public function run()
    {
        DB::table('compras')->insert([
            ['proveedor_id' => 1, 'usuario_id' => 1, 'total' => 500.00],
            ['proveedor_id' => 2, 'usuario_id' => 2, 'total' => 750.50],
            ['proveedor_id' => 3, 'usuario_id' => 3, 'total' => 1200.00],
            ['proveedor_id' => 4, 'usuario_id' => 4, 'total' => 400.75],
            ['proveedor_id' => 5, 'usuario_id' => 5, 'total' => 950.20],
        ]);
    }
}
