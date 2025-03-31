<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetalleComprasSeeder extends Seeder
{
    public function run()
    {
        DB::table('detalle_compras')->insert([
            ['compra_id' => 1, 'producto_id' => 1, 'cantidad' => 10, 'precio_total' => 85.00],
            ['compra_id' => 2, 'producto_id' => 2, 'cantidad' => 5, 'precio_total' => 225.00],
            ['compra_id' => 3, 'producto_id' => 3, 'cantidad' => 15, 'precio_total' => 180.00],
            ['compra_id' => 4, 'producto_id' => 4, 'cantidad' => 20, 'precio_total' => 130.00],
            ['compra_id' => 5, 'producto_id' => 5, 'cantidad' => 25, 'precio_total' => 125.00],
        ]);
    }
}
