<?php

namespace App\Http\Controllers;

use App\Models\MetodoPago;
use Illuminate\Http\Request;

class MetodoPagoController extends Controller
{
    // Mostrar todos los métodos de pago
    public function index()
    {
        $metodos = MetodoPago::all(); // Obtener todos los métodos de pago
        return view('metodos_pago.index', compact('metodos')); // Pasar a la vista
    }

    // Mostrar formulario para crear un nuevo método de pago
    public function create()
    {
        return view('metodos_pago.create'); // Vista para crear un nuevo método de pago
    }

    // Guardar un nuevo método de pago
    public function store(Request $request)
    {
        // Validación de los datos
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        // Crear el nuevo método de pago
        MetodoPago::create($request->all());

        return redirect()->route('metodos_pago.index')->with('success', 'Método de pago creado correctamente.');
    }

    // Mostrar los detalles de un método de pago
    public function show(MetodoPago $metodoPago)
    {
        return view('metodos_pago.show', compact('metodoPago')); // Pasar la variable a la vista
    }

    // Mostrar formulario para editar un método de pago
    public function edit(MetodoPago $metodoPago)
    {
        return view('metodos_pago.edit', compact('metodoPago')); // Vista para editar un método de pago
    }

    // Actualizar un método de pago
    public function update(Request $request, MetodoPago $metodoPago)
    {
        // Validación de los datos
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        // Actualizar el método de pago
        $metodoPago->update($request->all());

        return redirect()->route('metodos_pago.index')->with('success', 'Método de pago actualizado correctamente.');
    }

    // Eliminar un método de pago
    public function destroy(MetodoPago $metodoPago)
    {
        // Eliminar el método de pago
        $metodoPago->delete();

        return redirect()->route('metodos_pago.index')->with('success', 'Método de pago eliminado correctamente.');
    }
}
