<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function logout()
    {
        Auth::logout();  // Cerrar sesión
        return redirect()->route('login');  // Redirigir al formulario de login
    }
}
