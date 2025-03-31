@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="card shadow-sm p-4">
        <h2 class="text-center mb-4">Ventas</h2>

        <!-- Botones de acción -->
        <div class="d-flex justify-content-between mb-4">
            <a href="{{ route('ventas.create') }}" class="btn btn-primary">
                <i class="bi bi-cart-plus"></i> Nueva Venta
            </a>
            <a href="{{ url('bienvenida') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left-circle"></i> Volver al Inicio
            </a>
        </div>

        <!-- Mensaje si no hay ventas -->
        @if ($ventas->isEmpty())
            <p class="text-center">No hay ventas registradas.</p>
        @else
            <!-- Tabla de ventas -->
            <table class="table table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Fecha de Venta</th>
                        <th>Total</th>
                        <th>Método de Pago</th>
                        <th>Cajero</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ventas as $venta)
                        <tr>
                            <td>{{ $venta->id }}</td>
                            <td>{{ $venta->created_at->format('d/m/Y H:i') }}</td>
                            <td>${{ number_format($venta->total, 2) }}</td>
                            <td>{{ $venta->metodoPago->nombre ?? 'No especificado' }}</td>
                            <td>{{ $venta->usuario->nombre ?? 'No especificado' }}</td>
                            <td>
                                <a href="{{ route('ventas.show', $venta->id) }}" class="btn btn-info btn-sm">
                                    <i class="bi bi-eye"></i> Ver
                                </a>
                                <a href="{{ route('ventas.edit', $venta->id) }}" class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil-square"></i> Editar
                                </a>
                                <form action="{{ route('ventas.destroy', $venta->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar esta venta?')">
                                        <i class="bi bi-trash"></i> Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>
@endsection
