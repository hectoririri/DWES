@extends('layout/plantilla')
@section('title', 'Formulario')
@section('cuerpo')
<form method="POST" action="{{route('tareas.store')}}" enctype="multipart/form-data" class="bg-light p-4 rounded">
    <h2 class="text-secondary">Creando tarea tarea</h2>

    @include('tareas.form_tarea_campos')
    {{-- hacer lo mismo con otro formulario de edicion de tarea --}}

    <label for="nif_cif_registrado">NIF/CIF de usuario registrado</label>
    @error('nif_cif_registrado')
        <br>
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <input type="text" class="form-control" name="nif_cif_registrado" id="nif_cif_registrado" value="{{ old('nif_cif_registrado') }}">

    <label for="telefono_registrado">Teléfono de usuario registrado</label>
    @error('telefono_registrado')
        <br>
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    
    <a href="{{ route('tareas.index') }}" class="btn btn-outline-secondary">Cancelar</a>
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>
@endsection