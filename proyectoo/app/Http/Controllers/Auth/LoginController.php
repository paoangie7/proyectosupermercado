<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Mostrar el formulario de login
    public function showLoginForm()
    {
        return view('auth.login'); // Vista que contiene el formulario de login
    }

    // Lógica de login
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        // Intentar autenticar al usuario
        if (Auth::attempt($credentials)) {
            return redirect()->intended('/bienvenida');  // Redirige a la vista de bienvenida después de login
        }

        return back()->withErrors([
            'email' => 'Las credenciales no coinciden con nuestros registros.',
        ]);
    }
    protected $redirectTo = '/categorias'; // O la vista principal de tu aplicación

// O si no estás usando esta variable, puedes hacerlo de la siguiente manera
protected function authenticated(Request $request, $user)
{
    return redirect()->route('bienvenida'); // Redirige a la ruta que debe ser la primera vista
}


    // Cerrar sesión
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
