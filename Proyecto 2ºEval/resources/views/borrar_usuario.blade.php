@extends('layout/plantilla')
@section('title', 'Eliminar usuario')
@section('cuerpo')
<form method="post">
    <h2>¿Está seguro de que desea eliminar al siguiente usuario?</h2>
    <table class="table table-striped table-bordered">
        <tbody>
            <tr>
                <th>ID</th>
                <td>{!! $usuario['id'] !!}</td>
            </tr>
            <tr>
                <th>Nombre</th>
                <td>{!! $usuario['nombre'] !!}</td>
            </tr>
            <tr>
                <th>Contraseña</th>
                <td>{!! $usuario['passwd'] !!}</td>
            </tr>
            <tr>
                <th>Rol</th>
                <td>{!! $usuario['rol'] !!}</td>
            </tr>
        </tbody>
    </table>
    <a href="{!! miurl('mostrar/usuarios') !!}" class="btn btn-outline-secondary d-inline-flex align-items-center">Cancelar</a>
    <button type="submit" name="boton" class="btn btn-danger d-inline-flex align-items-center">Eliminar</button>
</form>
@endsection