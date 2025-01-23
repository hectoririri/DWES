@extends('layout/plantilla')
@section('title', 'Formulario')
@section('cuerpo')
<form method="POST" action="{{route('tareas.store')}}" enctype="multipart/form-data" class="bg-light p-4 rounded">
    <h2 class="text-secondary">Creando tarea tarea</h2>

    @dump($tarea->toArray())
    @include('formulario_tarea_campos')
    {{-- hacer lo mismo con otro formulario de edicion de tarea --}}
    <a href="{{ route('tareas.index') }}" class="btn btn-outline-secondary">Cancelar</a>
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>
@endsection