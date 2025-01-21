@extends('layout/plantilla')
@section('title', 'Detalles del usuario')
@section('cuerpo')
<h1 class="text-center">Detalles del usuario {{$usuario->nombre}}</h1>
<div class="table-responsive">
    <table class="table table-striped table-bordered text-center">
        <tbody>
            @foreach($usuario->toArray() as $index => $valor)
                @if (!in_array($index, ['id']))
                <tr>
                    <th class="text-center">{{ $index }}</th>
                    @if ($index == 'tipo')
                        <td class="text-center">{{ $valor == 'A' ? 'Administrador' : 'Operario' }}</td>
                    @else
                    <td class="text-center">{{ $valor }}</td>
                    @endif
                </tr>
                @endif
            @endforeach
            <tr>
                <td colspan="3" class="text-center">
                    <a href="{!! route("mostrar_usuarios") !!}" class="btn btn-outline-secondary d-inline-flex align-items-center">Volver atrás</a>
                    {{-- cambiar a route --}}
                    <a href="{!! miurl("modificar/usuario/{$usuario->id}") !!}" class="btn btn-outline-primary d-inline-flex align-items-center">Modificar</a>
                    <a href="{!! miurl("borrar/usuario/{$usuario->id}") !!}" class="btn btn-outline-danger d-inline-flex align-items-center">Borrar</a>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
