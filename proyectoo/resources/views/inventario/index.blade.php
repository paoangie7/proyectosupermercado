@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="card shadow-sm p-4">
        <h2 class="text-center mb-4">Inventario</h2>

        <!-- Botones de acción -->
        <div class="d-flex justify-content-between mb-4">
            <a href="{{ route('inventario.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Agregar Inventario
            </a>
            <a href="{{ route('bienvenida') }}" class="btn btn-primary">
                <i class="bi bi-arrow-left-circle"></i> Volver al inicio
            </a>
        </div>

        <!-- Tabla de inventario -->
        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($inventarios as $inventario)
                    <tr>
                        <td>{{ $inventario->id }}</td>
                        <td>{{ $inventario->producto->nombre }}</td>
                        <td>{{ $inventario->cantidad }}</td>
                        <td>
                            <!-- Mostrar imagen del producto si existe -->
                            @if($inventario->producto->imagen)
                                <img src="{{ asset('storage/' . $inventario->producto->imagen) }}" width="100" alt="Imagen del Producto">
                            @else
                                No tiene imagen
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('inventario.edit', $inventario->id) }}" class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil-square"></i> Editar
                            </a>
                            <form action="{{ route('inventario.destroy', $inventario->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este inventario?')">
                                    <i class="bi bi-trash"></i> Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
