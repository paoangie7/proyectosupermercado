@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Detalles de la Compra #{{ $compra->id }}</h1>

    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <p><strong>Proveedor:</strong> {{ $compra->proveedor->nombre }}</p>
            <p><strong>Usuario:</strong> {{ $compra->usuario->nombre }}</p>
            <p><strong>Total:</strong> <span class="badge bg-success">${{ number_format($compra->total, 2) }}</span></p>
        </div>
    </div>

    <h2 class="mb-3">Productos Comprados</h2>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio Total</th>
                    <th>Imagen</th>
                </tr>
            </thead>
            <tbody>
                @foreach($compra->detalles as $detalle)
                    <tr>
                        <td>{{ $detalle->producto->nombre }}</td>
                        <td>{{ $detalle->cantidad }}</td>
                        <td><span class="badge bg-primary">${{ number_format($detalle->precio_total, 2) }}</span></td>
                        <td>
                            @if($detalle->producto->imagen)
                                <img src="{{ asset('storage/' . $detalle->producto->imagen) }}" class="img-thumbnail" width="50" alt="Imagen del Producto">
                            @else
                                <span class="text-muted">No tiene imagen</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <a href="{{ route('compras.index') }}" class="btn btn-secondary mt-3">
        <i class="fas fa-arrow-left"></i> Volver a la lista
    </a>
</div>
@endsection
