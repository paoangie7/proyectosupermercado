<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuariosSeeder extends Seeder
{
    public function run()
    {
        DB::table('usuarios')->insert([
            ['nombre' => 'Paola Callahuara', 'email' => 'paola.callahuara.ml@gmail.com', 'password' => Hash::make('71897620'), 'rol_id' => 1],
            ['nombre' => 'Ana López', 'email' => 'ana@example.com', 'password' => Hash::make('123456'), 'rol_id' => 2],
            ['nombre' => 'Carlos Ramos', 'email' => 'carlos@example.com', 'password' => Hash::make('123456'), 'rol_id' => 3],
            ['nombre' => 'Lucía Fernández', 'email' => 'lucia@example.com', 'password' => Hash::make('123456'), 'rol_id' => 4],
            ['nombre' => 'Pedro Gómez', 'email' => 'pedro@example.com', 'password' => Hash::make('123456'), 'rol_id' => 5],
        ]);
    }
}
