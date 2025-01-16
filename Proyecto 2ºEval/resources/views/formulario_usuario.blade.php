@extends('layout/plantilla')
@section('title', 'Formulario De Alta Usuario')
@section('cuerpo')
<form method="post" enctype="multipart/form-data">
    <h2>{{$titulo}} usuario</h2>

    <label for="nombre">Nombre*</label>
    <span>{{ $errores->Error('nombre') }}</span>
    <input type="text" name="nombre" id="nombre" value="{{ ($_POST) ? $utiles->valorPost('nombre') : ($usuario['nombre'] ?? '') }}">
    <br> <br>

    <label for="passwd">Contraseña*</label>
    <span>{{ $errores->Error('passwd') }}</span>
    <input type="text" name="passwd" id="passwd" value="{{ ($_POST) ? $utiles->valorPost('passwd') : ($usuario['passwd'] ?? '') }}">
    <br> <br>

    <label for="rol">Rol*</label>
    <span>{{ $errores->Error('rol') }}</span>
    <input type="radio" name="rol" value="A" id="rol" {{ ($_POST) ? ($utiles->valorPost('rol') == 'A' ? 'checked' : '') : (($usuario['rol'] ?? '') == 'A' ? 'checked' : '') }}> A (Admin)
    <input type="radio" name="rol" value="O" id="rol" {{ ($_POST) ? ($utiles->valorPost('rol') == 'O' ? 'checked' : '') : (($usuario['rol'] ?? '') == 'O' ? 'checked' : '') }}> O (Operario)
    <br> <br>

    <a href="{{ miurl('mostrar/usuarios') }}" class="btn btn-outline-secondary d-inline-flex align-items-center">Cancelar</a>
    <button type="submit" class="btn btn-primary d-inline-flex align-items-center">Enviar</button>
    <br> <br>
</form>
@endsection