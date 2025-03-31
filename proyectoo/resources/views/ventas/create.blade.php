@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h2>Nueva Venta</h2>
    <form action="{{ route('ventas.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="usuario_id" class="form-label">Cajero</label>
            <select name="usuario_id" class="form-control" required>
                @foreach($usuarios as $usuario)
                    <option value="{{ $usuario->id }}">{{ $usuario->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="metodo_pago_id" class="form-label">Método de Pago</label>
            <select name="metodo_pago_id" class="form-control" required>
                @foreach($metodosPago as $metodo)
                    <option value="{{ $metodo->id }}">{{ $metodo->nombre }}</option>
                @endforeach
            </select>
        </div>
        <h4>Productos</h4>
        <div id="productos-container">
            <div class="producto-item">
                <select name="detalles[0][producto_id]" class="form-control" required>
                    @foreach($productos as $producto)
                        <option value="{{ $producto->id }}">{{ $producto->nombre }} - ${{ number_format($producto->precio, 2) }}</option>
                    @endforeach
                </select>
                <input type="number" name="detalles[0][cantidad]" class="form-control mt-2" placeholder="Cantidad" min="1" required>
            </div>
        </div>
        <button type="button" id="agregar-producto" class="btn btn-secondary mt-3">Agregar Producto</button>
        <br>
        <button type="submit" class="btn btn-success mt-3">Guardar Venta</button>
        <a href="{{ route('ventas.index') }}" class="btn btn-secondary mt-3">Cancelar</a>
    </form>
</div>
<script>
    let index = 1;
    document.getElementById('agregar-producto').addEventListener('click', function() {
        let container = document.getElementById('productos-container');
        let newProduct = document.createElement('div');
        newProduct.classList.add('producto-item', 'mt-2');
        newProduct.innerHTML = `
            <select name="detalles[\${index}][producto_id]" class="form-control" required>
                @foreach($productos as $producto)
                    <option value="{{ $producto->id }}">{{ $producto->nombre }} - ${{ number_format($producto->precio, 2) }}</option>
                @endforeach
            </select>
            <input type="number" name="detalles[\${index}][cantidad]" class="form-control mt-2" placeholder="Cantidad" min="1" required>
        `;
        container.appendChild(newProduct);
        index++;
    });
</script>
@endsection
