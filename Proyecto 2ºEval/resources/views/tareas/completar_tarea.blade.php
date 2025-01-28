@extends('layout/plantilla')
@section('title', 'Formulario para completar tarea')
@section('cuerpo')
<h2>Completar tarea</h2>

<table class="table table-striped table-bordered">
    <tbody>
        @foreach($tarea as $key => $value)
        <tr>
            <th>{!! $key !!}</th>
            <td>{!! $value !!}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<form method="post" enctype="multipart/form-data">
    <label for="estado">Estado de la tarea</label>
    @error('estado')
        <br>
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <input type="radio" name="estado" value="R" id="estado" @if(old('estado') == 'R') checked @endif>R (Realizada)
    <input type="radio" name="estado" value="C" id="estado" @if(old('estado') == 'C') checked @endif>C (Cancelada)
    <br> <br>

    <label for="fecha_realizacion">Fecha de realización de la tarea*</label>
    @error('fecha_realizacion')
    <br>
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror    
    <input type="date" name="fecha_realizacion" id="fecha_realizacion" value="{!! old('fecha_realizacion') !!}">
    <br> <br>


    <label for="anotaciones_posteriores">Anotaciones posteriores</label>
    @error('anotaciones_posteriores')
    <br>
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <textarea name="anotaciones_posteriores" id="anotaciones_posteriores">{!! old('anotaciones_posteriores') !!}</textarea>
    <br> <br>


    <a href="{!! route('tareas.index') !!}" class="btn btn-outline-secondary d-inline-flex align-items-center">Cancelar</a>
    <button type="submit" class="btn btn-primary d-inline-flex align-items-center">Completar</button>
    <br> <br>
</form>
@endsection