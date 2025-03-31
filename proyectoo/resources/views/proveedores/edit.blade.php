@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center">Editar Proveedor</h1>

    <form action="{{ route('proveedores.update', $proveedor->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $proveedor->nombre }}" required>
        </div>
        <div class="form-group">
            <label for="telefono">Teléfono</label>
            <input type="text" class="form-control" id="telefono" name="telefono" value="{{ $proveedor->telefono }}" required>
        </div>
        <div class="form-group">
            <label for="direccion">Dirección</label>
            <input type="text" class="form-control" id="direccion" name="direccion" value="{{ $proveedor->direccion }}" required>
        </div>
        <button type="submit" class="btn btn-success mt-3">Actualizar</button>
        <a href="{{ route('proveedores.index') }}" class="btn btn-secondary mt-3">Cancelar</a> <!-- Botón de Cancelar -->
    </form>
</div>
@endsection
