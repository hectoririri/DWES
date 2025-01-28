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

    <input type="text" class="form-control" name="telefono_registrado" id="telefono_registrado" value="{{ old('telefono_registrado') }}">
    <a href="{{ route('tareas.index') }}" class="btn btn-outline-secondary">Cancelar</a>
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>
@endsection