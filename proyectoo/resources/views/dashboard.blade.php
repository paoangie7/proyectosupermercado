@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2>Bienvenido al Dashboard</h2>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-danger">Cerrar sesión</button>
    </form>
</div>
@endsection
