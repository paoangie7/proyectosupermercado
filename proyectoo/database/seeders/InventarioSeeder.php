<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InventarioSeeder extends Seeder
{
    public function run()
    {
        DB::table('inventario')->insert([
            ['producto_id' => 1, 'cantidad' => 48],
            ['producto_id' => 2, 'cantidad' => 19],
            ['producto_id' => 3, 'cantidad' => 27],
            ['producto_id' => 4, 'cantidad' => 36],
            ['producto_id' => 5, 'cantidad' => 55],
        ]);
    }
}
