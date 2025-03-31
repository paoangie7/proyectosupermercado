@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Compra</h1>

    <form action="{{ route('compras.update', $compra->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="proveedor_id" class="form-label">Proveedor</label>
            <select class="form-control" name="proveedor_id" required>
                @foreach($proveedores as $proveedor)
                    <option value="{{ $proveedor->id }}" {{ $compra->proveedor_id == $proveedor->id ? 'selected' : '' }}>
                        {{ $proveedor->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="usuario_id" class="form-label">Usuario</label>
            <select class="form-control" name="usuario_id" required>
                @foreach($usuarios as $usuario)
                    <option value="{{ $usuario->id }}" {{ $compra->usuario_id == $usuario->id ? 'selected' : '' }}>
                        {{ $usuario->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="total" class="form-label">Total</label>
            <input type="number" step="0.01" class="form-control" name="total" value="{{ old('total', $compra->total) }}" required>
        </div>

        <div class="mb-3">
            <label for="productos" class="form-label">Productos</label>
            <select class="form-control" name="productos[]" multiple required>
                @foreach($productos as $producto)
                    <option value="{{ $producto->id }}" 
                        @if(in_array($producto->id, $compra->detalles->pluck('producto_id')->toArray())) selected @endif>
                        {{ $producto->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="cantidad" class="form-label">Cantidad</label>
            <input type="number" class="form-control" name="cantidad[]" value="{{ old('cantidad') }}" required>
        </div>

        <button type="submit" class="btn btn-success">Actualizar Compra</button>
        <a href="{{ route('compras.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
