<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriasSeeder extends Seeder
{
    public function run()
    {
        DB::table('categorias')->insert([
            ['nombre' => 'Lácteos'],
            ['nombre' => 'Carnes'],
            ['nombre' => 'Bebidas'],
            ['nombre' => 'Snacks'],
            ['nombre' => 'Panadería'],
        ]);
    }
}
