<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    public function usuario()
{
    return $this->belongsTo(Usuario::class, 'usuario_id', 'id');
}

    use Notifiable;

    protected $fillable = [
        'nombre', 'email', 'password', 'rol_id', 'pin',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Método para obtener el rol del usuario
    public function rol()
    {
        return $this->belongsTo(Rol::class);
    }
}
