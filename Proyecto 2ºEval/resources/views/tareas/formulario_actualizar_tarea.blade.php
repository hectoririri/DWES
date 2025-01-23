@extends('layout/plantilla')
@section('title', 'Formulario')
@section('cuerpo')
<form method="PUT" action="{{route('tareas.update')}}" enctype="multipart/form-data" class="bg-light p-4 rounded">
    <h2 class="text-secondary">Actualizando tarea tarea</h2>

    @dump($tarea->toArray())
    
    @include('formulario_tarea_campos')

    <label for="nif_cif_registrado">NIF/CIF de usuario registrado</label>
    <input type="text" class="form-control" name="nif_cif_registrado" id="nif_cif_registrado" value="{{ old('nif_cif_registrado') }}">
    <label for="telefono_registrado">Teléfono de usuario registrado</label>
    <input type="text" class="form-control" name="telefono_registrado" id="telefono_registrado" value="{{ old('telefono_registrado') }}">
    <a href="{{ route('tareas.index') }}" class="btn btn-outline-secondary">Cancelar</a>
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>
@endsection