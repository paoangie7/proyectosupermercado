<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\Proveedor;
use App\Models\Usuario;
use App\Models\Producto;
use App\Models\DetalleCompra;
use Illuminate\Http\Request;

class CompraController extends Controller
{
    // Mostrar todas las compras
    public function index()
    {
        $compras = Compra::with('detalles.producto')->get();  // Cargar detalles y productos asociados
        return view('compras.index', compact('compras'));
    }

    // Crear una nueva compra
    public function create()
    {
        $proveedores = Proveedor::all();
        $usuarios = Usuario::all();
        $productos = Producto::all();  // Asegúrate de tener productos cargados
        return view('compras.create', compact('proveedores', 'usuarios', 'productos'));
    }

    // Guardar una compra
    public function store(Request $request)
{
    // Validar los datos del formulario
    $request->validate([
        'proveedor_id' => 'required|exists:proveedores,id',
        'usuario_id' => 'required|exists:usuarios,id',
        'productos' => 'required|array',  // Se espera un array de productos
        'cantidad' => 'required|array',   // Se espera un array de cantidades
        'productos.*' => 'exists:productos,id', // Validar que cada producto exista
        'cantidad.*' => 'numeric|min:1',  // Validar cantidad como numérico y mayor que 0
    ]);

    // Inicializar el total de la compra
    $totalCompra = 0;

    // Crear una nueva compra
    $compra = new Compra();
    $compra->proveedor_id = $request->proveedor_id;
    $compra->usuario_id = $request->usuario_id;

    // Guardar la compra sin el total aún
    $compra->save();

    // Guardar los detalles de la compra y calcular el total
    foreach ($request->productos as $index => $producto_id) {
        $producto = Producto::find($producto_id);
        $cantidad = $request->cantidad[$index];
        $precioTotal = $producto->precio * $cantidad;

        // Crear el detalle de compra
        $detalleCompra = new DetalleCompra();
        $detalleCompra->compra_id = $compra->id;
        $detalleCompra->producto_id = $producto_id;
        $detalleCompra->cantidad = $cantidad;
        $detalleCompra->precio_total = $precioTotal;
        $detalleCompra->save();

        // Sumar al total de la compra
        $totalCompra += $precioTotal;
    }

    // Asignar el total calculado a la compra
    $compra->total = $totalCompra;
    $compra->save(); // Guardar la compra con el total calculado

    // Redirigir al listado de compras después de registrar
    return redirect()->route('compras.index')->with('success', 'Compra registrada con éxito.');
}

    // Mostrar los detalles de una compra
    public function show($id)
    {
        $compra = Compra::with('detalles.producto')->findOrFail($id);
        return view('compras.show', compact('compra'));
    }
    


    // Editar una compra
    public function edit(Compra $compra)
    {
        $proveedores = Proveedor::all();
        $productos = Producto::all();
        $usuarios = Usuario::all();
        return view('compras.edit', compact('compra', 'proveedores', 'productos', 'usuarios'));
    }

    // Actualizar la compra
public function update(Request $request, Compra $compra)
{
    // Validar los datos del formulario
    $request->validate([
        'proveedor_id' => 'required|exists:proveedores,id',
        'usuario_id' => 'required|exists:usuarios,id',
        'total' => 'required|numeric|min:0',
        'productos' => 'required|array',  // Se espera un array de productos
        'cantidad' => 'required|array',   // Se espera un array de cantidades
        'productos.*' => 'exists:productos,id', // Validar cada producto
        'cantidad.*' => 'numeric|min:1',  // Validar cantidad como numérico y mayor que 0
    ]);

    // Actualizar la compra
    $compra->proveedor_id = $request->proveedor_id;
    $compra->usuario_id = $request->usuario_id;
    $compra->total = $request->total;
    $compra->save();

    // Eliminar los detalles existentes de esta compra
    $compra->detalles()->delete();  // Elimina los detalles antes de actualizarlos

    // Guardar los nuevos detalles de la compra
    foreach ($request->productos as $index => $producto_id) {
        $detalleCompra = new DetalleCompra();
        $detalleCompra->compra_id = $compra->id;
        $detalleCompra->producto_id = $producto_id;
        $detalleCompra->cantidad = $request->cantidad[$index];  // Usar la cantidad correspondiente
        $detalleCompra->precio_total = $detalleCompra->cantidad * $detalleCompra->producto->precio;  // Suponiendo que tienes el precio en el producto
        $detalleCompra->save();
    }

    // Redirigir al listado de compras después de actualizar
    return redirect()->route('compras.index')->with('success', 'Compra actualizada con éxito.');
}


    // Eliminar una compra
    public function destroy(Compra $compra)
    {
        $compra->delete();
        return redirect()->route('compras.index')->with('success', 'Compra eliminada con éxito.');
    }
}
