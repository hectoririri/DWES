@extends('layout/plantilla')
@section('title', 'Formulario para completar tarea')
@section('cuerpo')
<form method="post" enctype="multipart/form-data">
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

    <label for="estado">Estado de la tarea</label>
    <span>{!! $errores->Error('estado') !!}</span>
    <input type="radio" name="estado" value="R" id="estado" checked {!! $utiles->valorPost('estado') == 'R' ? 'checked' : '' !!}>R (Realizada)
    <input type="radio" name="estado" value="C" id="estado" {!! $utiles->valorPost('estado') == 'C' ? 'checked' : '' !!}>C (Cancelada)
    <br> <br>

    <label for="fecha_realizacion">Fecha de realización de la tarea*</label>
    <span>{!! $errores->Error('fecha_realizacion') !!}</span>
    <input type="date" name="fecha_realizacion" id="fecha_realizacion" value="{!! ($_POST) ? $utiles->valorPost('fecha_realizacion') : ($tarea['fecha_realizacion'] ?? '') !!}">
    <br> <br>


    <label for="anotaciones_posteriores">Anotaciones posteriores</label>
    <span>{!! $errores->Error('anotaciones_posteriores') !!}</span>
    <textarea name="anotaciones_posteriores" id="anotaciones_posteriores">{!! ($_POST) ? $utiles->valorPost('anotaciones_posteriores') : ($tarea['anotaciones_posteriores'] ?? '') !!}</textarea>
    <br> <br>


    <a href="{!! miurl('mostrar/tareas') !!}" class="btn btn-outline-secondary d-inline-flex align-items-center">Cancelar</a>
    <button type="submit" class="btn btn-primary d-inline-flex align-items-center">Completar</button>
    <br> <br>
</form>
@endsection