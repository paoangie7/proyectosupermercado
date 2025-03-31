<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\Producto;
use App\Models\MetodoPago;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class VentaController extends Controller
{
    // Mostrar lista de ventas
    public function index()
    {
        $ventas = Venta::with('detalles.producto', 'metodoPago', 'usuario')->orderByDesc('created_at')->get();
        return view('ventas.index', compact('ventas'));
    }

    // Mostrar formulario para crear una nueva venta
    public function create()
    {
        $usuarios = Usuario::all();
        $metodosPago = MetodoPago::all();
        $productos = Producto::all();

        return view('ventas.create', compact('usuarios', 'metodosPago', 'productos'));
    }

    // Almacenar una nueva venta
    public function store(Request $request)
    {
        $request->validate([
            'usuario_id' => 'required|exists:usuarios,id',
            'metodo_pago_id' => 'required|exists:metodos_pago,id',
            'detalles' => 'required|array',
            'detalles.*.producto_id' => 'required|exists:productos,id',
            'detalles.*.cantidad' => 'required|integer|min:1',
        ]);

        DB::beginTransaction();

        try {
            $total = 0;
            $detalles = [];

            foreach ($request->detalles as $detalle) {
                $producto = Producto::findOrFail($detalle['producto_id']);
                $subtotal = $producto->precio * $detalle['cantidad'];
                $total += $subtotal;
                $detalles[] = [
                    'producto_id' => $producto->id,
                    'cantidad' => $detalle['cantidad'],
                    'precio_total' => $subtotal,
                ];
            }

            $venta = Venta::create([
                'usuario_id' => $request->usuario_id,
                'metodo_pago_id' => $request->metodo_pago_id,
                'total' => $total,
            ]);

            $venta->detalles()->createMany($detalles);

            DB::commit();

            return redirect()->route('ventas.index')->with('success', 'Venta creada exitosamente.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Hubo un error al crear la venta.'])->withInput();
        }
    }

    // Mostrar una venta específica
    public function show($id)
    {
        try {
            $venta = Venta::with('detalles.producto', 'metodoPago', 'usuario')->findOrFail($id);
            return view('ventas.show', compact('venta'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('ventas.index')->withErrors(['error' => 'Venta no encontrada.']);
        }
    }

    // Mostrar formulario de edición de una venta
    public function edit($id)
    {
        try {
            $venta = Venta::with('detalles.producto', 'metodoPago')->findOrFail($id);
            $productos = Producto::all();
            $metodosPago = MetodoPago::all();
            
            return view('ventas.edit', compact('venta', 'productos', 'metodosPago'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('ventas.index')->withErrors(['error' => 'Venta no encontrada.']);
        }
    }

    // Actualizar una venta existente
    public function update(Request $request, $id)
    {
        $request->validate([
            'usuario_id' => 'required|exists:usuarios,id',
            'metodo_pago_id' => 'required|exists:metodos_pago,id',
            'detalles' => 'required|array',
            'detalles.*.producto_id' => 'required|exists:productos,id',
            'detalles.*.cantidad' => 'required|integer|min:1',
        ]);

        DB::beginTransaction();

        try {
            $venta = Venta::findOrFail($id);
            $total = 0;
            $detalles = [];

            foreach ($request->detalles as $detalle) {
                $producto = Producto::findOrFail($detalle['producto_id']);
                $subtotal = $producto->precio * $detalle['cantidad'];
                $total += $subtotal;
                $detalles[] = [
                    'producto_id' => $producto->id,
                    'cantidad' => $detalle['cantidad'],
                    'precio_total' => $subtotal,
                ];
            }

            $venta->detalles()->delete();
            $venta->detalles()->createMany($detalles);

            $venta->update([
                'usuario_id' => $request->usuario_id,
                'metodo_pago_id' => $request->metodo_pago_id,
                'total' => $total,
            ]);

            DB::commit();

            return redirect()->route('ventas.index')->with('success', 'Venta actualizada correctamente.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Hubo un error al actualizar la venta.'])->withInput();
        }
    }

    // Eliminar una venta
    public function destroy($id)
    {
        try {
            $venta = Venta::findOrFail($id);
            $venta->detalles()->delete();
            $venta->delete();

            return redirect()->route('ventas.index')->with('success', 'Venta eliminada correctamente.');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('ventas.index')->withErrors(['error' => 'Venta no encontrada.']);
        }
    }
    // Método para generar informe de los productos más vendidos
public function productosMasVendidos()
{
    // Obtener la cantidad total de cada producto vendido
    $productosMasVendidos = DB::table('detalle_ventas')
        ->select('producto_id', DB::raw('SUM(cantidad) as total_vendido'))
        ->groupBy('producto_id')
        ->orderByDesc('total_vendido')
        ->limit(10) // Limitamos los resultados a los 10 productos más vendidos
        ->get();

    // Obtener los detalles del producto, como nombre y precio
    $productos = Producto::whereIn('id', $productosMasVendidos->pluck('producto_id'))
        ->get()
        ->keyBy('id');

    // Agregar los nombres de productos al resultado
    $productosMasVendidos = $productosMasVendidos->map(function ($item) use ($productos) {
        $item->producto_nombre = $productos[$item->producto_id]->nombre;
        $item->precio = $productos[$item->producto_id]->precio;
        return $item;
    });

    // Retornar la vista con los productos más vendidos
    return view('reportes.productos_mas_vendidos', compact('productosMasVendidos'));
}

}
