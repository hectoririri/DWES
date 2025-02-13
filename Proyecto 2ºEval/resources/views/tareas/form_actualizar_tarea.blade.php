@extends('layouts/plantilla')
@section('title', 'Formulario')
@section('cuerpo')
<form method="POST" action="{{route('tareas.update', ['tarea'=>$tarea])}}" enctype="multipart/form-data" class="bg-light p-4 rounded">
    @method('PATCH')
    <h2 class="text-secondary mb-5 text-center">Actualizando tarea Nº{{$tarea->id}}</h2>
    
    @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif    
    @include('tareas.form_campos_tarea')

    <div class="form-group">
        <label for="Fichero">Fichero resumen de tareas realizadas</label>
        @error('fichero')
                <br>
                <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input type="file" class="form-control-file" name="fichero" id="Fichero">
    </div>
    
    <div class="form-group">
        <label for="foto">Fotos del trabajo realizado</label>
        @error('foto')
                <br>
                <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input type="file" class="form-control-file" name="foto" id="foto">
    </div>

    <a href="{{ route('tareas.index') }}" class="btn btn-outline-secondary">Cancelar</a>
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>
@endsection