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

      <!-- Formulario de login -->
      <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
        <h2 class="text-center mb-4">Login</h2>

        <form action="{{ route('login') }}" method="POST">
          @csrf

          <!-- Input de correo electrónico -->
          <div class="form-outline mb-4">
            <input type="email" id="email" name="email" class="form-control form-control-lg" required />
            <label class="form-label" for="email">Email address</label>
          </div>

          <!-- Input de contraseña -->
          <div class="form-outline mb-4">
            <input type="password" id="password" name="password" class="form-control form-control-lg" required />
            <label class="form-label" for="password">Password</label>
          </div>

          <div class="d-flex justify-content-between align-items-center mb-4">
            <!-- Checkbox de recordar sesión -->
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="rememberMe" checked />
              <label class="form-check-label" for="rememberMe"> Remember me </label>
            </div>
            <a href="#!" class="text-muted">Forgot password?</a>
          </div>

          <!-- Botón de inicio de sesión -->
          <button type="submit" class="btn btn-primary btn-lg btn-block mb-4">
            Login
          </button>

          <!-- Divider -->
          <div class="divider d-flex align-items-center my-4">
            <p class="text-center fw-bold mx-3 mb-0 text-muted">OR</p>
          </div>

          <!-- Opciones de inicio de sesión con redes sociales -->
          <a class="btn btn-primary btn-lg btn-block" style="background-color: #3b5998" href="#!" role="button">
            <i class="fab fa-facebook-f me-2"></i>Continue with Facebook
          </a>
          <a class="btn btn-primary btn-lg btn-block" style="background-color: #55acee" href="#!" role="button">
            <i class="fab fa-twitter me-2"></i>Continue with Twitter
          </a>

          <!-- Enlace de registro -->
          <p class="mt-3 text-center">¿Eres nuevo? <a href="{{ route('register') }}">Regístrate aquí</a></p>
        </form>
      </div>
    </div>
  </div>
</section>
@endsection
