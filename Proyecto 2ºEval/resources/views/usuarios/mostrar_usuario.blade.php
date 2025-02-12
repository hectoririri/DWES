@extends('layouts/plantilla')
@section('title', 'Detalles del usuario')
@section('cuerpo')
<h1 class="text-center">Detalles del usuario {{$usuario->name}}</h1>
<div class="table-responsive">
    <table class="table table-striped table-bordered text-center">
        <tbody>
            <tr>
                <th class="text-center">DNI</th>
                <td class="text-center">{{ $usuario->dni }}</td>
            </tr>
            <tr>
                <th class="text-center">Nombre</th>
                <td class="text-center">{{ $usuario->name }}</td>
            </tr>
            <tr>
                <th class="text-center">Correo</th>
                <td class="text-center">{{ $usuario->email }}</td>
            </tr>
            <tr>
                <th class="text-center">Teléfono</th>
                <td class="text-center">{{ $usuario->telefono }}</td>
            </tr>
            <tr>
                <th class="text-center">Dirección</th>
                <td class="text-center">{{ $usuario->direccion }}</td>
            </tr>
            <tr>
                <th class="text-center">Rol</th>
                <td class="text-center">{{ $usuario->rol == 'A' ? 'Administrador' : 'Operario' }}</td>
            </tr>
            <tr>
                <th class="text-center">Fecha creación</th>
                <td class="text-center">{{ $usuario->created_at }}</td>
            </tr>
            <tr>
                <th class="text-center">Fecha modificación</th>
                <td class="text-center">{{ $usuario->updated_at }}</td>
            </tr>
            <tr>
                <td colspan="3" class="text-center">
                    <a href="{!! route("usuarios.index") !!}" class="btn btn-outline-secondary d-inline-flex align-items-center">Volver atrás</a>
                    {{-- cambiar a route --}}
                    <a href="{!! route("usuarios.edit", ['usuario' => $usuario->id]) !!}" class="btn btn-outline-primary d-inline-flex align-items-center">Modificar</a>
                    <a href="{!! route("confirmar.eliminar.usuario", ['usuario' => $usuario->id]) !!}" class="btn btn-outline-danger d-inline-flex align-items-center">Borrar</a>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
