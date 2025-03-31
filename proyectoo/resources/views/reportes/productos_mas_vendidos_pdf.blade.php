<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos Más Vendidos</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to right, #6a1b9a, #3f51b5);
            color: white;
            text-align: center;
            margin: 0;
            padding: 0;
        }

        h2 {
            margin-top: 20px;
            font-size: 28px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
        }

        .container {
            width: 90%;
            max-width: 900px;
            margin: 20px auto;
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            padding-bottom: 20px;
        }

        .header {
            padding: 20px;
            background: #3f51b5; /* Azul elegante */
            color: white;
            text-align: center;
            border-radius: 12px 12px 0 0;
        }

        .footer {
            padding: 10px;
            background: #ff9800; /* Dorado suave */
            color: white;
            text-align: center;
            font-size: 12px;
            position: relative;
            bottom: 0;
            width: 100%;
            margin-top: 20px;
            border-radius: 0 0 12px 12px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 15px;
            text-align: center;
        }

        th {
            background: #6a1b9a; /* Morado elegante */
            color: white;
            text-transform: uppercase;
        }

        tr:nth-child(even) {
            background: #f9f9f9; /* Gris claro para filas pares */
        }

        tr:nth-child(odd) {
            background: #ffffff;
        }

        tr:hover {
            background: #f1f1f1; /* Gris suave en hover */
            transition: 0.3s ease-in-out;
        }

        td {
            color: #333;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Reporte: Productos Más Vendidos</h2>
        </div>

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Stock</th>
                        <th>Precio</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productos as $producto)
                    <tr>
                        <td>{{ $producto->id }}</td>
                        <td>{{ $producto->nombre }}</td>
                        <td>{{ $producto->stock }}</td>
                        <td>${{ number_format($producto->precio, 2) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        <div class="footer">
            <p>Generado el {{ now()->format('d/m/Y H:i') }} | Supermercado Duran</p>
        </div>
    </div>
</body>
</html>
