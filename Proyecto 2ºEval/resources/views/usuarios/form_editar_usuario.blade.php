@extends('layouts/plantilla')
@section('title', 'Formulario De Alta Usuario')
@section('cuerpo')
<form method="POST" action="{{route('usuarios.update', compact('usuario'))}}" enctype="multipart/form-data">
    @method('PUT')
    <h2>Formulario de modificación de usuario</h2>

    @include('usuarios.form_campos_usuario')

    <a href="{{ route('usuarios.index') }}" class="btn btn-outline-secondary d-inline-flex align-items-center">Cancelar</a>
    <button type="submit" class="btn btn-primary d-inline-flex align-items-center">Enviar</button>
    <br> <br>
</form>
@endsection