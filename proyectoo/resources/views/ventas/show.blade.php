@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="mb-4 text-center">Detalles de Venta</h2>

    <div class="card shadow-lg">
        <div class="card-body">
            <p><strong>Fecha:</strong> {{ $venta->created_at->format('d/m/Y H:i') }}</p>
            <p><strong>Total:</strong> <span class="text-success fw-bold">${{ number_format($venta->total, 2) }}</span></p>
            <p><strong>Método de Pago:</strong> <span class="badge bg-info text-dark">{{ $venta->metodoPago->nombre ?? 'No especificado' }}</span></p>

            <h4 class="mt-4">Productos Vendidos</h4>
            <ul class="list-group mt-3">
                @foreach ($venta->detalles as $detalle)
                    <li class="list-group-item d-flex align-items-center">
                        @if($detalle->producto->imagen)
                            <img src="{{ asset('storage/' . $detalle->producto->imagen) }}" width="60" height="60" class="rounded me-3 border" alt="Imagen del Producto">
                        @else
                            <div class="me-3 text-muted">No tiene imagen</div>
                        @endif
                        <div>
                            <strong class="d-block">{{ $detalle->producto->nombre }}</strong>
                            <span class="text-muted">Cantidad:</span> {{ $detalle->cantidad }}<br>
                            <span class="text-muted">Precio Total:</span> <span class="text-primary">${{ number_format($detalle->precio_total, 2) }}</span>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="text-center mt-4">
        <a href="{{ route('ventas.index') }}" class="btn btn-secondary">Volver</a>
    </div>
</div>
@endsection
