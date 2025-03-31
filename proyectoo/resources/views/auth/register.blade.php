@extends('auth.auth')

@section('content')
<section class="vh-100">
  <div class="container py-5 h-100">
    <div class="row d-flex align-items-center justify-content-center h-100">
      <!-- Imagen de fondo -->
      <div class="col-md-8 col-lg-7 col-xl-6">
        <img src="https://img.freepik.com/vector-gratis/plantilla-logotipo-supermercado-carrito-compras_23-2148470295.jpg"
          class="img-fluid" alt="Phone image">
      </div>

      <!-- Formulario de registro -->
      <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
        <h2 class="text-center mb-4">Register</h2>

        <form action="{{ route('register') }}" method="POST">
          @csrf

          <!-- Input de nombre -->
          <div class="form-outline mb-4">
            <input type="text" id="nombre" name="nombre" class="form-control form-control-lg" value="{{ old('nombre') }}" required />
            <label class="form-label" for="nombre">Name</label>
            @error('nombre')
                <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>

          <!-- Input de correo electrónico -->
          <div class="form-outline mb-4">
            <input type="email" id="email" name="email" class="form-control form-control-lg" value="{{ old('email') }}" required />
            <label class="form-label" for="email">Email address</label>
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>

          <!-- Input de contraseña -->
          <div class="form-outline mb-4">
            <input type="password" id="password" name="password" class="form-control form-control-lg" required />
            <label class="form-label" for="password">Password</label>
            @error('password')
                <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>

          <!-- Confirmar contraseña -->
          <div class="form-outline mb-4">
            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control form-control-lg" required />
            <label class="form-label" for="password_confirmation">Confirm Password</label>
            @error('password_confirmation')
                <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>

          <!-- Selección de rol -->
          <div class="form-outline mb-4">
            <select name="rol_id" id="rol_id" class="form-control form-control-lg" required>
              @foreach ($roles as $rol)
                <option value="{{ $rol->id }}" {{ old('rol_id') == $rol->id ? 'selected' : '' }}>
                  {{ $rol->nombre }}
                </option>
              @endforeach
            </select>
            <label class="form-label" for="rol_id">Role</label>
            @error('rol_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>

          <!-- Botón de registro -->
          <button type="submit" class="btn btn-primary btn-lg btn-block mb-4">
            Register
          </button>

          <!-- Enlace de login -->
          <p class="text-center">
            ¿Ya tienes cuenta? <a href="{{ route('login') }}">Inicia sesión aquí</a>
          </p>
        </form>
      </div>
    </div>
  </div>
</section>
@endsection
