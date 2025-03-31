@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="text-center mb-4">Crear Nuevo Método de Pago</h2>

    <form action="{{ route('metodos_pago.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" name="nombre" required>
        </div>

        <button type="submit" class="btn btn-primary">Guardar Método de Pago</button>
    </form>
</div>
@endsection
