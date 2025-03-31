<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;

    // Especificar el nombre de la tabla en la base de datos
    protected $table = 'proveedores'; // El nombre correcto de la tabla

    // Otros atributos del modelo
    protected $fillable = [
        'nombre',
        'telefono',
        'direccion',
    ];
}
