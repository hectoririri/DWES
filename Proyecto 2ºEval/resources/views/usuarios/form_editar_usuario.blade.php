@extends('layouts/plantilla')
@section('title', 'Formulario De Alta Usuario')
@section('cuerpo')
<form method="POST" action="{{route('usuarios.update', compact('usuario'))}}" enctype="multipart/form-data">
    @method('PUT')
    
    @if (auth()->user()->isAdmin())
    <h2>Formulario edición de usuario</h2>
    @include('usuarios.form_campos_usuario')
    
    @else
    <h2>Editando perfil</h2>
    <div class="form-group">
        <label for="email">Correo electrónico*</label>
        @error('email')
            <br>
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input type="text" class="form-control" name="email" id="email" value="{{ old('email', $usuario->email) }}">
    </div>

    <div class="form-group">
        <label for="fecha_creacion">Fecha de creación*</label>
        @error('fecha_creacion')
            <br>
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input type="datetime-local" class="form-control" name="fecha_creacion" id="fecha_creacion" value="{{ old('fecha_creacion', $usuario->fecha_creacion) }}">
    </div>
    @endif

    <a href="{{ route('usuarios.index') }}" class="btn btn-outline-secondary d-inline-flex align-items-center">Cancelar</a>
    <button type="submit" class="btn btn-primary d-inline-flex align-items-center">Enviar</button>
    <br> <br>
</form>
@endsection