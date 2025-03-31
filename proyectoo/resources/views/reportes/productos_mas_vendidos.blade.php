@extends('layouts.app')

@section('content')
    <h1 class="text-center font-weight-bold text-primary" style="font-size: 36px;">Productos Más Vendidos</h1>

    <!-- Tabla de productos más vendidos -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="font-weight-bold text-danger" style="font-size: 18px;">Producto</th>
                <th class="font-weight-bold text-danger" style="font-size: 18px;">Cantidad Vendida</th>
                <th class="font-weight-bold text-danger" style="font-size: 18px;">Precio Unitario</th>
                <th class="font-weight-bold text-danger" style="font-size: 18px;">Total Vendido</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productosMasVendidos as $producto)
                <tr>
                    <td style="font-size: 16px; font-weight: bold;">{{ $producto->producto_nombre }}</td>
                    <td style="font-size: 16px; font-weight: bold;">{{ $producto->total_vendido }}</td>
                    <td style="font-size: 16px; font-weight: bold;">{{ $producto->precio }}</td>
                    <td style="font-size: 16px; font-weight: bold;">{{ $producto->total_vendido * $producto->precio }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Contenedor para la gráfica -->
    <div class="mt-5">
        <canvas id="productosChart" width="400" height="200"></canvas>
    </div>

    <!-- Botón de volver -->
    <div class="mt-4">
        <a href="{{ route('bienvenida') }}" class="btn btn-primary btn-lg">Volver</a>
    </div>

    <!-- Script para generar la gráfica -->
    <script>
        var ctx = document.getElementById('productosChart').getContext('2d');
        var productosChart = new Chart(ctx, {
            type: 'bar', // Tipo de gráfica (barra)
            data: {
                labels: @json($productosMasVendidos->pluck('producto_nombre')), // Nombres de los productos
                datasets: [{
                    label: 'Cantidad Vendida',
                    data: @json($productosMasVendidos->pluck('total_vendido')), // Cantidades vendidas
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.6)',  // Color para la primera barra
                        'rgba(54, 162, 235, 0.6)',  // Color para la segunda barra
                        'rgba(255, 206, 86, 0.6)',  // Color para la tercera barra
                        'rgba(75, 192, 192, 0.6)',  // Color para la cuarta barra
                        'rgba(153, 102, 255, 0.6)', // Color para la quinta barra
                        'rgba(255, 159, 64, 0.6)'   // Color para la sexta barra
                    ], // Colores de las barras (puedes agregar más colores si tienes más productos)
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ], // Bordes de las barras
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    legend: {
                        labels: {
                            font: {
                                size: 16,
                                weight: 'bold'
                            },
                            color: '#000'
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true, // La escala en el eje Y comienza desde 0
                        ticks: {
                            font: {
                                size: 16,
                                weight: 'bold'
                            }
                        }
                    },
                    x: {
                        ticks: {
                            font: {
                                size: 16,
                                weight: 'bold'
                            }
                        }
                    }
                }
            }
        });
    </script>
@endsection
