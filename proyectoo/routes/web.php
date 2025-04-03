<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\DetalleVentaController;
use App\Http\Controllers\MetodoPagoController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\ProductoInactivoController;


Route::get('/', function () {
    return redirect()->route('login');  
});

// Rutas de autenticación
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LogoutController::class, 'logout'])->name('logout');



// Ruta protegida por autenticación (bienvenida)
Route::middleware('auth')->get('/bienvenida', function () {
    return view('bienvenida');  // La vista que quieres mostrar después de loguearse
});

// Ruta de inicio (home) (solo accesible si el usuario está autenticado)
Route::middleware('auth')->get('/home', [HomeController::class, 'index'])->name('home');

// Rutas de recursos para los controladores
Route::resource('categorias', CategoriaController::class);
Route::resource('productos', ProductoController::class);
Route::resource('detalle_venta', DetalleVentaController::class);
Route::resource('metodos_pago', MetodoPagoController::class);
Route::resource('inventario', InventarioController::class);
Route::resource('proveedores', ProveedorController::class);
Route::resource('compras', CompraController::class);
Route::resource('ventas', VentaController::class);

// Rutas específicas para ciertos controladores
Route::get('compras', [CompraController::class, 'index'])->name('compras.index');
Route::get('/detalle_ventas/create/{ventaId}', [DetalleVentaController::class, 'create'])->name('detalle_ventas.create');
Route::get('/ventas/{id}/edit', [VentaController::class, 'edit'])->name('ventas.edit');
Route::put('/ventas/{id}', [VentaController::class, 'update'])->name('ventas.update');
// Ruta de inicio (home) después del login
Route::middleware(['auth'])->get('/bienvenida', [HomeController::class, 'index'])->name('bienvenida');

// Ruta para la página principal
Route::middleware(['auth'])->get('/categorias', [CategoriaController::class, 'index'])->name('categorias.index');

// Ruta para la página de bienvenida, si deseas mostrarla
Route::middleware(['auth'])->get('/bienvenida', function () {
    return view('bienvenida'); 
})->name('bienvenida');


// Ruta de registro
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

use Illuminate\Http\Request;
Route::resource('ventas', VentaController::class);

Route::get('productos/create', [ProductoController::class, 'create'])->name('productos.create');

Route::get('/reportes/productos-mas-vendidos', [VentaController::class, 'productosMasVendidos'])->name('reportes.productos_mas_vendidos');
use App\Http\Controllers\ReporteController;

Route::get('/reportes/productos-mas-vendidos/pdf', [ReporteController::class, 'productosMasVendidosPDF'])->name('reportes.productos_mas_vendidos.pdf');

Route::get('compras/{compra}/edit', [CompraController::class, 'edit'])->name('compras.edit');


Route::resource('metodos_pago', MetodoPagoController::class);
Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');
Route::post('/productos', [ProductoController::class, 'store'])->name('productos.store');
Route::get('/productos/{id}/edit', [ProductoController::class, 'edit'])->name('productos.edit');
Route::put('/productos/{id}', [ProductoController::class, 'update'])->name('productos.update');
Route::put('/productos/{id}/dar-de-baja', [ProductoController::class, 'darDeBaja'])->name('productos.darDeBaja');
Route::put('/productos/{id}/activar', [ProductoController::class, 'activarProducto'])->name('productos.activar');
Route::resource('productos', ProductoController::class)->only(['index', 'create', 'store']);
Route::put('/productos/{id}/activar', [ProductoController::class, 'activarProducto'])->name('productos.activar');
Route::resource('productos', ProductoController::class)->except(['show']);

