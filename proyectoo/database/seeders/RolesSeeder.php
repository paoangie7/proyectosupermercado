<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    public function run()
    {
        DB::table('roles')->insert([
            ['nombre' => 'Administrador'],
            ['nombre' => 'Empleado'],
            ['nombre' => 'Cajero'],
            ['nombre' => 'Supervisor'],
            ['nombre' => 'Almacenero'],
        ]);
    }
}
