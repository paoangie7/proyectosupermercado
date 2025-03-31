<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use App\Models\Producto;

class ReporteController extends Controller
{
    public function productosMasVendidosPDF()
    {
        // Obtener los productos más vendidos (ejemplo)
        $productos = Producto::orderBy('stock', 'asc')->take(10)->get();

        // Cargar la vista y pasar datos
        $pdf = app('dompdf.wrapper');
$pdf->loadView('reportes.productos_mas_vendidos_pdf', compact('productos'));
return $pdf->download('productos_mas_vendidos.pdf');

    }
}
