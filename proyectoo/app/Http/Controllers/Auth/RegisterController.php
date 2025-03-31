<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use App\Models\Rol;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    // Mostrar el formulario de registro
    public function showRegistrationForm()
    {
        // Obtener todos los roles
        $roles = Rol::all();

        // Pasar los roles a la vista
        return view('auth.register', compact('roles'));
    }

    // Registrar un nuevo usuario
    public function register(Request $request)
    {
        // Validación de los datos
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:usuarios',
            'password' => 'required|string|min:8|confirmed',
            'rol_id' => 'required|exists:roles,id',  // Validar que el rol exista
        ]);

        if ($validator->fails()) {
            return redirect()->route('register')
                ->withErrors($validator)
                ->withInput();
        }

        // Crear el nuevo usuario
        $usuario = Usuario::create([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'rol_id' => $request->rol_id,  // Asignar el rol al usuario
        ]);

        // Iniciar sesión automáticamente después de registrar
        auth()->loginUsingId($usuario->id);  // Usamos loginUsingId

        // Redirigir a la página principal
        return redirect()->route('bienvenida');  // Redirigir a la página principal

    }
}
