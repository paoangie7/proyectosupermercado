<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;

    protected $fillable = ['usuario_id', 'metodo_pago_id', 'total'];

    public function metodoPago()
    {
        return $this->belongsTo(MetodoPago::class, 'metodo_pago_id', 'id');
    }
    public function usuario()
{
    return $this->belongsTo(Usuario::class, 'usuario_id', 'id');
}
    public function detalles()
    {
        return $this->hasMany(DetalleVenta::class);
    }
}

