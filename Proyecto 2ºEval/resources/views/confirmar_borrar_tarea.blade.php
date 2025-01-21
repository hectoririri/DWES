@extends('layout/plantilla')
@section('title', 'Eliminar tarea')
@section('cuerpo')
<form method="post">
    <h2>¿Está seguro de que desea eliminar la siguiente tarea?</h2>
    <table class="table table-hover table-bordered">
        <tbody>
            <tr class="table-secondary">
                <th>ID</th>
                <td>{!!$tarea->id!!}</td>
            </tr>
            <tr class="table-secondary">
                <th>Nombre</th>
                <td>{!!$tarea->nombre!!}</td>
            </tr>
            <tr class="table-secondary">
                <th>Apellidos</th>
                <td>{!!$tarea->apellidos!!}</td>
            </tr>
            <tr class="table-secondary">
                <th>Provincia</th>
                <td>{!!$tarea->provincia!!}</td>
            </tr>
            <tr class="table-secondary">
                <th>Descripción</th>
                <td>{!!$tarea->descripcion!!}</td>
            </tr>
            <tr class="table-secondary">
                <th>Dirección</th>
                <td>{!!$tarea->direccion!!}</td>
            </tr>
            <tr class="table-secondary">
                <th>Estado de la tarea</th>
                <td>{!!$tarea->estado!!}</td>
            </tr>
            <tr class="table-secondary">
                <th>Fecha de realización</th>
                <td>{!!$tarea->fecha_realizacion!!}</td>
            </tr>
        </tbody>
    </table>
    <a href="{{ route('mostrar_tareas') }}" class="btn btn-outline-secondary d-inline-flex align-items-center">Cancelar</a>
    <button type="submit" name="boton" class="btn btn-danger d-inline-flex align-items-center">Eliminar</button>
</form>
@endsection