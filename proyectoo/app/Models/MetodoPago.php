<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MetodoPago extends Model
{
    use HasFactory;

    // Nombre de la tabla en la base de datos (opcional si es pluralizado correctamente)
    protected $table = 'metodos_pago';

    // Campos que se pueden asignar masivamente
    protected $fillable = ['nombre'];

    // Si no usas timestamps, puedes agregar esta línea (si no los necesitas):
    // public $timestamps = false;
}
