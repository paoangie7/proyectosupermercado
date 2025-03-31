<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    protected $fillable = ['proveedor_id', 'usuario_id', 'total'];

    // Si los timestamps no están habilitados por defecto, puedes asegurarte de que estén habilitados
    public $timestamps = true;  // Esto asegura que las fechas de creación y actualización se gestionen automáticamente

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class);
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

    public function detalles()
{
    return $this->hasMany(DetalleCompra::class, 'compra_id');
}

}

