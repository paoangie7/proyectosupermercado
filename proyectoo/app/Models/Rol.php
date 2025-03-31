<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use HasFactory;

    // Asegúrate de que el nombre de la tabla sea correcto
    protected $table = 'roles';  // Cambia 'rols' por 'roles'

    protected $fillable = ['nombre'];

    // Relación con los usuarios
    public function usuarios()
    {
        return $this->hasMany(Usuario::class);
    }
}
