@extends('layout/plantilla')
@section('title', 'Eliminar tarea')
@section('cuerpo')
<form method="POST" action="{{route('tareas.destroy', ['tarea' => $tarea])}}">
    @method('DELETE')
    <h2>¿Está seguro de que desea eliminar la siguiente tarea?</h2>
    <table class="table table-hover table-bordered">
        <tbody>
            <tr class="table-secondary">
                <th class="text-center">ID</th>
                <td class="text-center">{!!$tarea->id!!}</td>
            </tr>
            <tr class="table-secondary">
                <th class="text-center">Nombre</th>
                <td class="text-center">{!!$tarea->nombre!!}</td>
            </tr>
            <tr class="table-secondary">
                <th class="text-center">Apellidos</th>
                <td class="text-center">{!!$tarea->apellidos!!}</td>
            </tr>
            <tr class="table-secondary">
                <th class="text-center">Provincia</th>
                <td class="text-center">{!!$tarea->provincia!!}</td>
            </tr>
            <tr class="table-secondary">
                <th class="text-center">Descripción</th>
                <td class="text-center">{!!$tarea->descripcion!!}</td>
            </tr>
            <tr class="table-secondary">
                <th class="text-center">Dirección</th>
                <td class="text-center">{!!$tarea->direccion!!}</td>
            </tr>
            <tr class="table-secondary">
                <th class="text-center">Estado de la tarea</th>
                <td class="text-center">{!!$tarea->estado!!}</td>
            </tr>
            <tr class="table-secondary">
                <th class="text-center">Fecha de realización</th>
                <td class="text-center">{!!$tarea->fecha_realizacion!!}</td>
            </tr>
        </tbody>
    </table>
    <a href="{{ route('tareas.index') }}" class="btn btn-outline-secondary d-inline-flex align-items-center">Cancelar</a>
    <button type="submit" name="boton" class="btn btn-danger d-inline-flex align-items-center">Eliminar</button>
</form>
@endsection