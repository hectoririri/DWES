@extends('layouts/plantilla')
@section('title', 'Formulario De Creacion de Remesa')
@section('cuerpo')
<form method="POST" action="{{route('remesas.store')}}" enctype="multipart/form-data">

    <h2>Formulario de creación de remesa</h2>

    <div class="form-group">
        <label for="fecha">Fecha*</label>
        @error('fecha')
            <br>
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input type="datetime-local" class="form-control" name="fecha" id="fecha" value="{{ old('fecha') }}">
    </div>
    
    <div class="form-group">
        <label for="motivo">Motivo</label>
        @error('motivo')
            <br>
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input type="text" class="form-control" name="motivo" id="motivo" value="{{ old('motivo') }}">
    </div>

    <a href="{{ route('remesas.index') }}" class="btn btn-outline-secondary d-inline-flex align-items-center">Cancelar</a>
    <button type="submit" class="btn btn-primary d-inline-flex align-items-center">Crear remesa</button>
</form>
@endsection