@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center">Registrar Nueva Compra</h1>

    <form action="{{ route('compras.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="proveedor_id" class="form-label">Proveedor</label>
            <select class="form-control" name="proveedor_id" required>
                @foreach($proveedores as $proveedor)
                    <option value="{{ $proveedor->id }}">{{ $proveedor->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="usuario_id" class="form-label">Usuario</label>
            <select class="form-control" name="usuario_id" required>
                @foreach($usuarios as $usuario)
                    <option value="{{ $usuario->id }}">{{ $usuario->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="productos" class="form-label">Productos</label>
            <select class="form-control" name="productos[]" multiple required>
                @foreach($productos as $producto)
                    <option value="{{ $producto->id }}">{{ $producto->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="cantidad" class="form-label">Cantidad</label>
            <input type="number" class="form-control" name="cantidad[]" required>
        </div>

        <button type="submit" class="btn btn-success">Registrar Compra</button>
        <a href="{{ route('compras.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
