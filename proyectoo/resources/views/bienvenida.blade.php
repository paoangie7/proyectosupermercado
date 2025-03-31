@extends('layouts.app')

@section('content')
<div class="container-fluid px-4" style="min-height: 100vh;">
    <h1 class="mt-4 text-center">Bienvenido al Supermercado</h1>
    <p class="lead mb-5 text-center">Aquí encontrarás toda la información que necesitas a un solo click</p>

    <!-- Fila de tarjetas -->
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
        <!-- Tarjeta Categorías -->
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4 shadow-lg border-0 rounded">
                <a href="{{ route('categorias.index') }}">
                    <img src="https://previews.123rf.com/images/ionutparvu/ionutparvu1612/ionutparvu161200410/67602131-categor%C3%ADas-selling-signo-texto-palabra-logotipo-rojo.jpg" class="card-img-top" alt="Imagen Categorías" style="height: 200px; object-fit: cover;">
                </a>
                <div class="card-body">
                    <h5 class="card-title">Ver Categorías</h5>
                    <a href="{{ route('categorias.index') }}" class="btn btn-light">Ir</a>
                </div>
            </div>
        </div>

        <!-- Tarjeta Productos -->
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4 shadow-lg border-0 rounded">
                <a href="{{ route('productos.index') }}">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRDfni9T2lqC2cGuU0ItGgjo_tbZnQIpWYpnUO5kXbeNuSKdNSkRg-rD-H8aK4qJhDM0mY&usqp=CAU" class="card-img-top" alt="Imagen Productos" style="height: 200px; object-fit: cover;">
                </a>
                <div class="card-body">
                    <h5 class="card-title">Ver Productos</h5>
                    <a href="{{ route('productos.index') }}" class="btn btn-dark">Ir</a>
                </div>
            </div>
        </div>

        <!-- Tarjeta Ventas -->
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4 shadow-lg border-0 rounded">
                <a href="{{ route('ventas.index') }}">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSAneayMf3zW3s9feJDROt2C9fRTyPP7PSxew&s" class="card-img-top" alt="Imagen Ventas" style="height: 200px; object-fit: cover;">
                </a>
                <div class="card-body">
                    <h5 class="card-title">Ver Ventas</h5>
                    <a href="{{ route('ventas.index') }}" class="btn btn-light">Ir</a>
                </div>
            </div>
        </div>

        <!-- Tarjeta Métodos de Pago -->
        <div class="col-xl-3 col-md-6">
            <div class="card bg-info text-white mb-4 shadow-lg border-0 rounded">
                <a href="{{ route('metodos_pago.index') }}">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRL2jgc8u3-pmb9dwOY9wh86d5bGJZQvzcR9w&s" class="card-img-top" alt="Imagen Métodos de Pago" style="height: 200px; object-fit: cover;">
                </a>
                <div class="card-body">
                    <h5 class="card-title">Ver Métodos de Pago</h5>
                    <a href="{{ route('metodos_pago.index') }}" class="btn btn-light">Ir</a>
                </div>
            </div>
        </div>

        <!-- Tarjeta Productos Más Vendidos -->
        <div class="col-xl-3 col-md-6">
            <div class="card bg-dark text-white mb-4 shadow-lg border-0 rounded">
                <a href="{{ route('reportes.productos_mas_vendidos') }}">
                    <img src="https://yt3.googleusercontent.com/MX-9pTwxrd79WD0tZRPz9EHbQFFiNEWqq66oXCOA94U8B0dWPCnQvOUiqgVskD5cIRKVEugRkg=s900-c-k-c0x00ffffff-no-rj" 
                         class="card-img-top" alt="Imagen Productos Más Vendidos" style="height: 200px; object-fit: cover;">
                </a>
                <div class="card-body">
                    <h5 class="card-title">Productos Más Vendidos</h5>
                    <a href="{{ route('reportes.productos_mas_vendidos') }}" class="btn btn-light">Ir</a>
                    <a href="{{ route('reportes.productos_mas_vendidos.pdf') }}" class="btn btn-danger">
                        Descargar PDF
                    </a>            
                </div>
            </div>
        </div>

        <!-- Tarjeta Inventario -->
        <div class="col-xl-3 col-md-6">
            <div class="card bg-secondary text-white mb-4 shadow-lg border-0 rounded">
                <a href="{{ route('inventario.index') }}">
                    <img src="https://mecaluxes.cdnwm.com/blog/img/inventario-fisico-almacen.1.2.jpg" class="card-img-top" alt="Imagen Inventario" style="height: 200px; object-fit: cover;">
                </a>
                <div class="card-body">
                    <h5 class="card-title">Ver Inventario</h5>
                    <a href="{{ route('inventario.index') }}" class="btn btn-light">Ir</a>
                </div>
            </div>
        </div>

        <!-- Tarjeta Proveedores -->
        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white mb-4 shadow-lg border-0 rounded">
                <a href="{{ route('proveedores.index') }}">
                    <img src="https://i0.wp.com/www.pmconsul.com/wp-content/uploads/proveedores.png?resize=370%2C427&ssl=1" 
                         class="card-img-top" alt="Imagen Proveedores" style="height: 200px; object-fit: cover;">
                </a>
                <div class="card-body">
                    <h5 class="card-title">Ver Proveedores</h5>
                    <a href="{{ route('proveedores.index') }}" class="btn btn-light">Ir</a>
                </div>
            </div>
        </div>

        <!-- Tarjeta Compras -->
        <div class="col-xl-3 col-md-6">
            <div class="card text-white mb-4 shadow-lg border-0 rounded" style="background-color: purple;">
                <a href="{{ route('compras.index') }}">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTlWW-RLFItPq_T6FqSHDAWQfnE84CrST1LsA&s" class="card-img-top" alt="Imagen Compras" style="height: 200px; object-fit: cover;">
                </a>
                <div class="card-body">
                    <h5 class="card-title">Ver Compras</h5>
                    <a href="{{ route('compras.index') }}" class="btn btn-light">Ir</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
