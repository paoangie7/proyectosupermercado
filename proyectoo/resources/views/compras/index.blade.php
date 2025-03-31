@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="card shadow-sm p-4">
        <h2 class="text-center mb-4">Listado de Compras</h2>

        <!-- Botones de acción -->
        <div class="d-flex justify-content-between mb-4">
            <a href="{{ route('compras.create') }}" class="btn btn-primary">
                <i class="bi bi-cart-plus"></i> Crear Nueva Compra
            </a>
            <a href="{{ route('bienvenida') }}" class="btn btn-primary">
                <i class="bi bi-arrow-left-circle"></i> Volver al inicio
            </a>
        </div>

        <!-- Tabla de compras -->
        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Proveedor</th>
                    <th>Usuario</th>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio Total</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($compras as $compra)
                    @foreach($compra->detalles as $detalle) <!-- Iterar sobre los detalles de cada compra -->
                        <tr>
                            <td>{{ $compra->id }}</td>
                            <td>{{ $compra->proveedor->nombre }}</td>  <!-- Nombre del proveedor -->
                            <td>{{ $compra->usuario->nombre }}</td>  <!-- Nombre del usuario -->
                            <td>{{ $detalle->producto->nombre }}</td> <!-- Nombre del producto -->
                            <td>{{ $detalle->cantidad }}</td>  <!-- Cantidad del producto -->
                            <td>{{ $detalle->precio_total }}</td>  <!-- Precio total del detalle -->
                            <td>
                                <a href="{{ route('compras.show', $compra->id) }}" class="btn btn-info btn-sm">
                                    <i class="bi bi-eye"></i> Ver
                                </a>
                                <a href="{{ route('compras.edit', $compra->id) }}" class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil-square"></i> Editar
                                </a>
                                <form action="{{ route('compras.destroy', $compra->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar esta compra?')">
                                        <i class="bi bi-trash"></i> Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
