<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            RolesSeeder::class,
            UsuariosSeeder::class,
            CategoriasSeeder::class,
            ProductosSeeder::class,
            ProveedoresSeeder::class,
            ComprasSeeder::class,
            DetalleComprasSeeder::class,
            MetodosPagoSeeder::class,
            VentasSeeder::class,
            DetalleVentaSeeder::class,  // Aquí debería ser DetalleVentaSeeder
            InventarioSeeder::class,
        ]);
        
    }
}
