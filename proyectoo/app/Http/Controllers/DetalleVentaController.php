<?php

namespace App\Http\Controllers;

use App\Models\DetalleVenta;
use App\Models\Producto;
use App\Models\Venta;
use Illuminate\Http\Request;

class DetalleVentaController extends Controller
{
    public function create($ventaId)
    {
        $productos = Producto::all();
        $venta = Venta::findOrFail($ventaId);
        return view('detalle_venta.create', compact('venta', 'productos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'venta_id' => 'required|exists:ventas,id',
            'producto_id' => 'required|exists:productos,id',
            'cantidad' => 'required|integer|min:1',
            'precio_total' => 'required|numeric|min:0',
        ]);

        DetalleVenta::create($request->all());

        return redirect()->route('ventas.show', $request->venta_id)->with('success', 'Detalle agregado correctamente.');
    }

    public function destroy($id)
    {
        $detalle = DetalleVenta::findOrFail($id);
        $detalle->delete();

        return back()->with('success', 'Detalle eliminado correctamente.');
    }
}
