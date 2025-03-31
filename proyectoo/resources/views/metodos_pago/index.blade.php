@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="card shadow-sm p-4">
        <h2 class="text-center mb-4">Métodos de Pago</h2>

        <!-- Botón para crear un nuevo método de pago -->
        <a href="{{ route('metodos_pago.create') }}" class="btn btn-primary mb-4">
            <i class="bi bi-plus-circle"></i> Nuevo Método de Pago
        </a>

        <!-- Tabla de métodos de pago -->
        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($metodos as $metodo)
                    <tr>
                        <td>{{ $metodo->nombre }}</td>
                        <td>
                            <a href="{{ route('metodos_pago.edit', $metodo) }}" class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil-square"></i> Editar
                            </a>
                            <form action="{{ route('metodos_pago.destroy', $metodo) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este método de pago?')">
                                    <i class="bi bi-trash"></i> Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Botón para volver al inicio con ícono -->
        <a href="{{ route('bienvenida') }}" class="btn btn-primary">
            <i class="bi bi-arrow-left-circle"></i> Volver al inicio
        </a>
    </div>
</div>
@endsection
