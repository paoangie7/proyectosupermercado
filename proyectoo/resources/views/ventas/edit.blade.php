@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="card shadow-sm p-4">
        <h2 class="text-center mb-4">Editar Venta</h2>

        <form action="{{ route('ventas.update', $venta->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="metodo_pago_id" class="form-label">Método de Pago</label>
                <select name="metodo_pago_id" class="form-control" required>
                    @foreach ($metodosPago as $metodo)
                        <option value="{{ $metodo->id }}" {{ $venta->metodo_pago_id == $metodo->id ? 'selected' : '' }}>
                            {{ $metodo->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <h5>Productos</h5>
            @foreach ($productos as $producto)
                @php
                    $detalle = $venta->detalles->where('producto_id', $producto->id)->first();
                @endphp
                <div class="mb-3">
                    <input type="checkbox" name="detalles[{{ $producto->id }}][producto_id]" value="{{ $producto->id }}"
                        {{ $detalle ? 'checked' : '' }}>
                    {{ $producto->nombre }} - ${{ $producto->precio }}
                    
                    <input type="number" name="detalles[{{ $producto->id }}][cantidad]"
                        value="{{ $detalle ? $detalle->cantidad : '' }}"
                        placeholder="Cantidad" class="form-control" required>
                    
                    <input type="number" name="detalles[{{ $producto->id }}][precio_total]"
                        value="{{ $detalle ? $detalle->precio_total : '' }}"
                        placeholder="Precio Total" class="form-control mt-2" readonly>
                </div>
            @endforeach

            <button type="submit" class="btn btn-primary mt-3">Actualizar Venta</button>
            <a href="{{ route('ventas.index') }}" class="btn btn-secondary mt-3">Cancelar</a>
        </form>
    </div>
</div>
@endsection
