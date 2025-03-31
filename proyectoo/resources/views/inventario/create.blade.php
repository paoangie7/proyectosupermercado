@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center">Agregar Inventario</h1>

    <form action="{{ route('inventario.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="producto_id" class="form-label">Producto</label>
            <select class="form-control" name="producto_id" required>
                @foreach($productos as $producto)
                    <option value="{{ $producto->id }}">{{ $producto->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="cantidad" class="form-label">Cantidad</label>
            <input type="number" class="form-control" name="cantidad" required>
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('inventario.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
