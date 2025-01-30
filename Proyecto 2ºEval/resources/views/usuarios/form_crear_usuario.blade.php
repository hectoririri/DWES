@extends('layout/plantilla')
@section('title', 'Formulario De Alta Usuario')
@section('cuerpo')
<form method="POST" action="{{route('usuarios.store')}}" enctype="multipart/form-data">

    <h2>Formulario de creación de usuario</h2>

    <div class="form-group">
        <label for="dni">DNI*</label>
        @error('dni')
            <br>
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input type="text" class="form-control" name="dni" id="dni" value="{{ old('dni') }}">
    </div>

    <div class="form-group">
        <label for="nombre">Nombre*</label>
        @error('nombre')
            <br>
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input type="text" class="form-control" name="nombre" id="nombre" value="{{ old('nombre') }}">
    </div>

    <div class="form-group">
        <label for="password">Contraseña*</label>
        @error('password')
            <br>
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input type="text" class="form-control" name="password" id="password" value="{{ old('password') }}">
    </div>

    <div class="form-group">
        <label for="correo">Correo electrónico*</label>
        @error('correo')
            <br>
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input type="text" class="form-control" name="correo" id="correo" value="{{ old('correo') }}">
    </div>

    <div class="form-group">
        <label for="telefono">Telefono*</label>
        @error('telefono')
            <br>
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input type="text" class="form-control" name="telefono" id="telefono" value="{{ old('telefono') }}">
    </div>

    <div class="form-group">
        <label for="direccion">Direccion</label>
        @error('direccion')
            <br>
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input type="text" class="form-control" name="direccion" id="direccion" value="{{ old('direccion') }}">
    </div>

    <div class="form-group">
        <label for="rol">Rol*</label>
        @error('rol')
            <br>
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input type="text" class="form-control" name="rol" id="rol" value="{{ old('rol') }}">
    </div>

    <a href="{{ route('usuarios.index') }}" class="btn btn-outline-secondary d-inline-flex align-items-center">Cancelar</a>
    <button type="submit" class="btn btn-primary d-inline-flex align-items-center">Enviar</button>
    <br> <br>
</form>
@endsection