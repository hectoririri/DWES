@extends('layout/plantilla')
@section('title', 'Formulario')
@section('cuerpo')
<form method="POST" action="{{route('tareas.update', ['tarea'=>$tarea])}}" enctype="multipart/form-data" class="bg-light p-4 rounded">
    @method('PATCH')
    <h2 class="text-secondary">Actualizando tarea tarea</h2>
    @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif
    @dump($tarea->toArray())
    
    @include('tareas.form_tarea_campos')

    <div class="form-group">
        <label for="fichero">Fichero resumen de tareas realizadas</label>
        <input type="file" class="form-control-file" name="fichero_resumen" id="fichero">
    </div>
    
    <div class="form-group">
        <label for="foto">Fotos del trabajo realizado</label>
        <input type="file" class="form-control-file" name="foto" id="foto">
    </div>

    <a href="{{ route('tareas.index') }}" class="btn btn-outline-secondary">Cancelar</a>
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>
@endsection