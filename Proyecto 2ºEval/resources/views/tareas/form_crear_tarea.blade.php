@extends('layout/plantilla')
@section('title', 'Formulario')
@section('cuerpo')
<form method="POST" action="{{route('tareas.store')}}" enctype="multipart/form-data" class="bg-light p-4 rounded">
    <h1 class="text-primary text-center mb-5">Creando tarea</h1>

    @if (!auth()->check())
        <h3 class="text-secondary">Validese con una cuenta cliente registrada en nuestro sistema</h3>

        <div class="form-group">
            <label for="nif_cif">NIF o CIF*</label>
            @error('nif_cif')
                <br>
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <input type="text" class="form-control" name="nif_cif" id="nif_cif" value="{{ old('nif_cif', $tarea->nif_cif) }}">
        </div>
        
        <div class="form-group">
            <label for="telefono_contacto">Teléfono de contacto*</label>
            @error('telefono')
                <br>
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <input type="text" class="form-control" name="telefono" id="telefono_contacto" value="{{ old('telefono', $tarea->telefono) }}">
        </div>
    @endif

    {{-- Añadimos campos comunes --}}
    @include('tareas.form_campos_tarea')

    <a href="{{ route('tareas.index') }}" class="btn btn-outline-secondary">Cancelar</a>
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>
@endsection