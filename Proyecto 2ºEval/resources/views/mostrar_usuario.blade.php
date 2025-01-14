@extends('layout/plantilla')
@section('title', 'Detalles del usuario')
@section('cuerpo')
<h1 class="text-center">Detalles del usuario {{$usuario['nombre']}}</h1>
<table class="table table-striped table-bordered text-center">
    <tbody>
        @foreach($usuario as $key => $value)
            <tr>
                <th class="text-center">{{ $key }}</th>
                <td class="text-center">{{ $value }}</td>
            </tr>
        @endforeach
        <tr>
            <td colspan="3" class="text-center">
                <a href="{!! miurl("mostrar/usuarios") !!}" class="btn btn-outline-secondary d-inline-flex align-items-center">Volver atrás</a>
                <a href="{!! miurl("modificar/usuario/{$usuario['id']}") !!}" class="btn btn-outline-primary d-inline-flex align-items-center">Modificar</a>
                <a href="{!! miurl("borrar/usuario/{$usuario['id']}") !!}" class="btn btn-outline-danger d-inline-flex align-items-center">Borrar</a>
            </td>
        </tr>
    </tbody>
</table>
@endsection
