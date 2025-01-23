@extends('layout/plantilla')
@section('title', 'Formulario De Alta Usuario')
@section('cuerpo')
<form method="post" action="usuarios" enctype="multipart/form-data">
    <h2>{{$titulo}} usuario</h2>

    <label for="nombre">Nombre*</label>
    <span>{{ $errores->Error('nombre') }}</span>
    <input type="text" name="nombre" id="nombre" value="">
    <br> <br>

    <label for="passwd">Contraseña*</label>
    <span>{{ $errores->Error('passwd') }}</span>
    <input type="text" name="passwd" id="passwd" value="">
    <br> <br>

    <label for="rol">Rol*</label>
    <span>{{ $errores->Error('rol') }}</span>
    <input type="radio" name="rol" value="A" id="rol"> A (Admin)
    <input type="radio" name="rol" value="O" id="rol"> O (Operario)
    <br> <br>

    <a href="{{ route('usuarios.index') }}" class="btn btn-outline-secondary d-inline-flex align-items-center">Cancelar</a>
    <button type="submit" class="btn btn-primary d-inline-flex align-items-center">Enviar</button>
    <br> <br>
</form>
@endsection