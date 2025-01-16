@extends('layout/plantilla')
@section('title', 'Eliminar tarea')
@section('cuerpo')
<form method="post">
    <h2>¿Está seguro de que desea eliminar la siguiente tarea?</h2>
    <table class="table table-striped table-bordered">
        <tbody>
            <tr>
                <th>Nombre</th>
                <td>{!!$tarea['nombre']!!}</td>
            </tr>
            <tr>
                <th>Apellidos</th>
                <td>{!!$tarea['apellidos']!!}</td>
            </tr>
            <tr>
                <th>Descripción</th>
                <td>{!!$tarea['descripcion']!!}</td>
            </tr>
            <tr>
                <th>Dirección</th>
                <td>{!!$tarea['direccion']!!}</td>
            </tr>
            <tr>
                <th>Estado de la tarea</th>
                <td>{!!$tarea['estado']!!}</td>
            </tr>
            <tr>
                <th>Fecha de realización</th>
                <td>{!!$tarea['fecha_realizacion']!!}</td>
            </tr>
        </tbody>
    </table>
    <a href="{{ miurl('mostrar/tareas') }}" class="btn btn-outline-secondary d-inline-flex align-items-center">Cancelar</a>
    <button type="submit" name="boton" class="btn btn-danger d-inline-flex align-items-center">Eliminar</button>
</form>
@endsection