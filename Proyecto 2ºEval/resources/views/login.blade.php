@extends('layout/plantilla')
@section('title', 'Inicio de sesión')
@section('cuerpo')
    <h1 class="text-center">Inicio de sesión</h1>
    <form method="POST" action="{{ miurl('') }}" class="bg-light p-4 rounded">
        <div class="form-group">
            <label for="usuario">Nombre usuario:</label>
            <input type="text" class="form-control" name="usuario" id="usuario" value="">
        </div>
        <div class="form-group">
            <label for="passwd">Contraseña:</label>
            <input type="password" class="form-control" name="passwd" id="passwd" value="">
        </div>
        <div class="form-group">
            <span class="text-danger">
                @if (isset($error))
                    {{ $error }}
                @endif
            </span>
        </div>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" name="recordar" id="recordar">
            <label class="form-check-label" for="recordar">Recordarme</label>
        </div>
        <button type="submit" class="btn btn-secondary mt-3">Iniciar sesión</button>
    </form>
@endsection