@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="card shadow-sm p-4">
        <h2 class="text-center mb-4">Productos Activos</h2>

        <!-- Formulario de búsqueda -->
        <form action="{{ route('productos.index') }}" method="GET" class="mb-3">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Buscar producto por nombre" value="{{ request()->query('search') }}">
                <button class="btn btn-primary" type="submit">
                    <i class="bi bi-search"></i> Buscar
                </button>
            </div>
        </form>

        <a href="{{ route('productos.create') }}" class="btn btn-success mb-3">
            <i class="bi bi-plus-circle"></i> Nuevo Producto
        </a>

        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Categoría</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($productos as $producto)
                    <tr>
                        <td>{{ $producto->id }}</td>
                        <td>{{ $producto->nombre }}</td>
                        <td>{{ $producto->descripcion }}</td>
                        <td>{{ $producto->precio }}</td>
                        <td>{{ $producto->stock }}</td>
                        <td>{{ $producto->categoria->nombre }}</td>

                        <td>
                            @if($producto->imagen)
                                <img src="{{ asset('storage/' . $producto->imagen) }}" width="100" alt="Imagen del Producto">
                            @else
                                No tiene imagen
                            @endif
                        </td>

                        <td>
                            <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-warning">Editar</a>
                            
                            <form action="{{ route('productos.darDeBaja', $producto->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-secondary">Dar de baja</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Volver al inicio -->
        <a href="{{ route('bienvenida') }}" class="btn btn-primary mb-3">Volver al inicio</a>

        <!-- Botón para mostrar u ocultar la lista de productos dados de baja -->
        <button id="toggleBajaBtn" class="btn btn-info mb-3" onclick="toggleBajaProductos()">
            <i class="bi bi-eye"></i> Mostrar productos dados de baja
        </button>

        <!-- Tabla de productos dados de baja (inactivos) -->
        <div id="bajaProductos" style="display:none;">
            <h2 class="text-center mb-4">Productos Dados de Baja</h2>

            @if($productosInactivos->isEmpty())
                <p>No hay productos dados de baja.</p>
            @else
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th>Stock</th>
                        <th>Categoría</th>
                        <th>Imagen</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($productosInactivos as $producto)
                        <tr>
                            <td>{{ $producto->id }}</td>
                            <td>{{ $producto->nombre }}</td>
                            <td>{{ $producto->descripcion }}</td>
                            <td>{{ $producto->precio }}</td>
                            <td>{{ $producto->stock }}</td>
                            <td>{{ $producto->categoria->nombre }}</td>

                            <td>
                                @if($producto->imagen)
                                    <img src="{{ asset('storage/' . $producto->imagen) }}" width="100" alt="Imagen del Producto">
                                @else
                                    No tiene imagen
                                @endif
                            </td>

                            <td>
                                <form action="{{ route('productos.activar', $producto->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-success">Reactivar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>
    </div>
</div>

<!-- Agregar el JavaScript para mostrar y ocultar la tabla -->
<script>
    function toggleBajaProductos() {
        var bajaProductosDiv = document.getElementById('bajaProductos');
        var toggleBajaBtn = document.getElementById('toggleBajaBtn');

        if (bajaProductosDiv.style.display === "none") {
            bajaProductosDiv.style.display = "block";
            toggleBajaBtn.textContent = "Ocultar productos dados de baja";
        } else {
            bajaProductosDiv.style.display = "none";
            toggleBajaBtn.textContent = "Mostrar productos dados de baja";
        }
    }
</script>
@endsection
