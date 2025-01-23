@extends('layout/plantilla')
@section('title', 'Eliminar usuario')
@section('cuerpo')
<form method="post">
    <h2>¿Está seguro de que desea eliminar al siguiente usuario?</h2>
    <table class="table table-striped table-bordered">
        <tbody>
            <tr>
                <th class="text-center">ID</th>
                <td class="text-center">{!! $usuario->id !!}</td>
            </tr>
            <tr>
                <th class="text-center">Nombre</th>
                <td class="text-center">{!! $usuario->nombre !!}</td>
            </tr>
            <tr>
                <th class="text-center">Correo Electrónico</th>
                <td class="text-center">{!! $usuario->correo !!}</td>
            </tr>
            <tr>
                <th class="text-center">Rol</th>
                <td class="text-center">{{ $usuario->tipo == 'A' ? 'Administrador' : 'Operario' }}</td>
            </tr>
            <tr>
                <th class="text-center">Fecha Alta</th>
                <td class="text-center">{!! $usuario->fecha_alta !!}</td>
            </tr>
        </tbody>
    </table>
    <a href="{!! route('usuarios.index') !!}" class="btn btn-outline-secondary d-inline-flex align-items-center">Cancelar</a>
    <button type="submit" name="boton" class="btn btn-danger d-inline-flex align-items-center">Eliminar</button>
</form>
@endsection