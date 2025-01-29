@extends('layout/plantilla')
@section('title', 'Formulario')
@section('cuerpo')
<form method="POST" action="{{route('tareas.store')}}" enctype="multipart/form-data" class="bg-light p-4 rounded">
    <h2 class="text-secondary">Creando tarea tarea</h2>
    @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif
    @include('tareas.form_tarea_campos')

    <fieldset>
        <legend>Validación de cliente</legend>
        <p>Introduzca los credenciales válidos para poder enviar la incidencia</p>

        <label for="nif_cif_registrado">NIF/CIF de usuario registrado</label>
        @error('nif_cif_registrado')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input type="text" class="form-control" name="nif_cif_registrado" id="nif_cif_registrado" value="{{ old('nif_cif_registrado') }}">
    
        <label for="telefono_registrado">Teléfono de usuario registrado</label>
        @error('telefono_registrado')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input type="text" class="form-control" name="telefono_registrado" id="telefono_registrado" value="{{ old('telefono_registrado') }}">
    </fieldset>

    <a href="{{ route('tareas.index') }}" class="btn btn-outline-secondary">Cancelar</a>
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>
@endsection