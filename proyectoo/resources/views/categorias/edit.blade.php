@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="card shadow-sm p-4 w-100" style="max-width: 500px;">
        <h2 class="text-center mb-4">Editar Categoría</h2>

        <form action="{{ route('categorias.update', $categoria->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre de la Categoría</label>
                <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre" value="{{ old('nombre', $categoria->nombre) }}" placeholder="Ej. Lácteos">
                @error('nombre')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary w-100">
                <i class="bi bi-save"></i> Guardar Cambios
            </button>
        </form>
        
        <br>
        <a href="{{ route('categorias.index') }}" class="btn btn-outline-secondary w-100">
            <i class="bi bi-arrow-left-circle"></i> Volver
        </a>
    </div>
</div>
@endsection
