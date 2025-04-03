<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    public function index(Request $request)
    {
        // Búsqueda de productos activos
        $search = $request->query('search');
        $productos = Producto::where('activo', true)
            ->when($search, function ($query, $search) {
                return $query->where('nombre', 'like', "%{$search}%");
            })
            ->get();

        // Obtener productos inactivos (dados de baja)
        $productosInactivos = Producto::where('activo', false)->get();

        return view('productos.index', compact('productos', 'search', 'productosInactivos'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        return view('productos.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'nullable',
            'precio' => 'required|numeric',
            'stock' => 'required|integer',
            'categoria_id' => 'required|exists:categorias,id',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('imagen')) {
            $imagenPath = $request->file('imagen')->store('productos', 'public');
        } else {
            $imagenPath = null;
        }

        Producto::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'stock' => $request->stock,
            'categoria_id' => $request->categoria_id,
            'imagen' => $imagenPath
        ]);

        return redirect()->route('productos.index')->with('success', 'Producto agregado correctamente');
    }

    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        $categorias = Categoria::all();
        return view('productos.edit', compact('producto', 'categorias'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'nullable',
            'precio' => 'required|numeric',
            'stock' => 'required|integer',
            'categoria_id' => 'required|exists:categorias,id',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $producto = Producto::findOrFail($id);

        if ($request->hasFile('imagen')) {
            if ($producto->imagen) {
                Storage::disk('public')->delete($producto->imagen);
            }
            $imagenPath = $request->file('imagen')->store('productos', 'public');
        } else {
            $imagenPath = $producto->imagen;
        }

        $producto->update([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'stock' => $request->stock,
            'categoria_id' => $request->categoria_id,
            'imagen' => $imagenPath
        ]);

        return redirect()->route('productos.index')->with('success', 'Producto actualizado correctamente');
    }

    public function darDeBaja($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->update(['activo' => false]);

        return redirect()->route('productos.index')->with('success', 'Producto dado de baja correctamente');
    }

    public function activarProducto($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->update(['activo' => true]);

        return redirect()->route('productos.index')->with('success', 'Producto reactivado correctamente');
    }
}
