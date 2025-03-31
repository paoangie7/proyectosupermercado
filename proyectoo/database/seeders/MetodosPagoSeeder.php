<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MetodosPagoSeeder extends Seeder
{
    public function run()
    {
        DB::table('metodos_pago')->insert([
            ['nombre' => 'Efectivo'],
            ['nombre' => 'Tarjeta de Crédito'],
            ['nombre' => 'Tarjeta de Débito'],
            ['nombre' => 'Transferencia Bancaria'],
            ['nombre' => 'Pago Móvil'],
        ]);
    }
}
