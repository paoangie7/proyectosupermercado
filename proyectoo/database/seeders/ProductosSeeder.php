<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductosSeeder extends Seeder
{
    public function run()
    {
        DB::table('productos')->insert([
            ['nombre' => 'Leche', 'descripcion' => 'Leche entera 1L', 'precio' => 8.50, 'stock' => 50, 'categoria_id' => 1],
            ['nombre' => 'Carne de res', 'descripcion' => '1kg de carne de res fresca', 'precio' => 45.00, 'stock' => 20, 'categoria_id' => 2],
            ['nombre' => 'Coca-Cola', 'descripcion' => 'Botella 2L', 'precio' => 12.00, 'stock' => 30, 'categoria_id' => 3],
            ['nombre' => 'Papas fritas', 'descripcion' => 'Bolsa 250g', 'precio' => 6.50, 'stock' => 40, 'categoria_id' => 4],
            ['nombre' => 'Pan francés', 'descripcion' => 'Bolsa de 5 panes', 'precio' => 5.00, 'stock' => 60, 'categoria_id' => 5],
        ]);
    }
}
