<?php

namespace Database\Seeders;

use App\Models\Venta;
use App\Models\DetalleVenta;
use App\Models\Producto;
use App\Models\Usuario;
use App\Models\MetodoPago;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class VentasSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Crear 10 ventas de ejemplo
        for ($i = 0; $i < 10; $i++) {
            // Obtener un usuario y un método de pago aleatorio
            $usuario = Usuario::inRandomOrder()->first();
            $metodoPago = MetodoPago::inRandomOrder()->first();

            // Crear la venta
            $venta = Venta::create([
                'usuario_id' => $usuario->id,
                'metodo_pago_id' => $metodoPago->id,
                'total' => 0, // El total lo actualizaremos más tarde
            ]);

            // Crear detalles de venta para cada venta
            $totalVenta = 0;
            $detalles = [];

            // Generamos entre 1 y 5 productos aleatorios por venta
            $productos = Producto::inRandomOrder()->take(rand(1, 5))->get();

            foreach ($productos as $producto) {
                $cantidad = rand(1, 3); // Cantidad aleatoria entre 1 y 3
                $precioTotal = $producto->precio * $cantidad;
                $totalVenta += $precioTotal;

                $detalles[] = [
                    'venta_id' => $venta->id,
                    'producto_id' => $producto->id,
                    'cantidad' => $cantidad,
                    'precio_total' => $precioTotal,
                ];
            }

            // Actualizar el total de la venta
            $venta->total = $totalVenta;
            $venta->save();

            // Insertar los detalles de la venta
            DetalleVenta::insert($detalles);
        }
    }
}
