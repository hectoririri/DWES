@extends('layout/plantilla')
@section('title', 'Detalles de la tarea')
@section('cuerpo')
<h1 class="text-center">Detalles de la tarea Nº{{$tarea['id']}}</h1>
<table class="table table-striped table-bordered text-center">
    <tbody>
        @foreach($tarea as $key => $value)
            <tr>
                <th class="text-center">{{ $key }}</th>
                <td class="text-center">{{ $value }}</td>
            </tr>
        @endforeach
        <tr>
            <td colspan="3" class="text-center">
                <a href="{!! miurl("mostrar/tareas") !!}" class="btn btn-outline-secondary d-inline-flex align-items-center">Volver atrás</a>
                @if (\App\Models\SesionUsuario::getInstance()->isAdmin())
                    <a href="{!! miurl("modificar/tarea/{$tarea['id']}") !!}" class="btn btn-outline-primary d-inline-flex align-items-center">Modificar</a>
                    <a href="{!! miurl("borrar/tarea/{$tarea['id']}") !!}" class="btn btn-outline-danger d-inline-flex align-items-center">Borrar</a>
                @endif
                @if (!\App\Models\SesionUsuario::getInstance()->isAdmin() && ($tarea['estado'] == 'P' || $tarea['estado'] == 'B'))
                    <a href="{!! miurl("completar/tarea/{$tarea['id']}") !!}" class="btn btn-outline-success">Completar tarea</a>
                @endif
            </td>
        </tr>
    </tbody>
</table>
@endsection
