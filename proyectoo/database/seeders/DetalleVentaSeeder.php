<?php

namespace Database\Seeders;

use App\Models\DetalleVenta;
use App\Models\Venta;
use App\Models\Producto;
use Illuminate\Database\Seeder;

class DetalleVentaSeeder extends Seeder
{
    public function run()
    {
        // Crear 20 detalles de venta de ejemplo
        for ($i = 0; $i < 20; $i++) {
            $venta = Venta::inRandomOrder()->first(); // Obtener una venta aleatoria
            $producto = Producto::inRandomOrder()->first(); // Obtener un producto aleatorio

            $cantidad = rand(1, 3); // Cantidad aleatoria entre 1 y 3
            $precioTotal = $producto->precio * $cantidad;

            DetalleVenta::create([
                'venta_id' => $venta->id,
                'producto_id' => $producto->id,
                'cantidad' => $cantidad,
                'precio_total' => $precioTotal,
            ]);

            // Actualizar el total de la venta
            $venta->total += $precioTotal;
            $venta->save();
        }
    }
}
