@extends('layout/plantilla')
@section('title', 'Detalles de la tarea')
@section('cuerpo')
@php
    use App\Models\Usuario;
    use App\Models\Cliente;
@endphp
<h1 class="text-center">Detalles de la tarea Nº{{$tarea->id}}</h1>
@if (session('mensaje'))
    <div class="alert alert-success">
        {{ session('mensaje') }}
    </div>
@endif
<table class="table table-striped table-bordered text-center">
    <tbody>
        <tr>
            <th class="text-center">Descripción</th>
            <td class="text-center">{{ $tarea->descripcion }}</td>
        </tr>
        <tr>
            <th class="text-center">Dirección</th>
            <td class="text-center">{{ $tarea->direccion }}</td>
        </tr>
        <tr>
            <th class="text-center">Población</th>
            <td class="text-center">{{ $tarea->poblacion }}</td>
        </tr>
        <tr>
            <th class="text-center">Código postal</th>
            <td class="text-center">{{ $tarea->cod_postal }}</td>
        </tr>
        <tr>
            <th class="text-center">Provincia</th>
            <td class="text-center">{{ $tarea->provincia }}</td>
        </tr>
        <tr>
            <th class="text-center">Estado</th>
            <td class="text-center">{{ $tarea->estado }}</td>
        </tr>
        <tr>
            <th class="text-center">Fecha de creación</th>
            <td class="text-center">{{ $tarea->fecha_creacion }}</td>
        </tr>
        <tr>
            <th class="text-center">Fecha de realización</th>
            <td class="text-center">@if ($tarea->fecha_realizacion == null) No realizada aún @else {{ $tarea->fecha_realizacion }} @endif</td>
        </tr>
        <tr>
            <th class="text-center">Fecha de actualización</th>
            <td class="text-center"> @if ($tarea->fecha_actualizacion == null) No actualizado aún @else {{ $tarea->fecha_actualizacion }} @endif </td>
        </tr>
        <tr>
            <th class="text-center">Operario</th>
            <td class="text-center"><a href="{!! route("usuarios.show", ['usuario' => Usuario::find($tarea->operario_id)]) !!}" target=”_blank”>{{ Usuario::find($tarea->operario_id)->name }} </a> || {{ Usuario::find($tarea->operario_id)->email }}</td>
        </tr>
        <tr>
            <th class="text-center">Cliente</th>
            <td class="text-center"><a href="{!! route("cliente.show", ['cliente' => Cliente::find($tarea->cliente_id)]) !!}" target=”_blank”>{{ Cliente::find($tarea->cliente_id)->name }} </a> || {{ Cliente::find($tarea->cliente_id)->email }}</td>
        </tr>
        <tr>
            <th class="text-center">Anotaciones anteriores</th>
            <td class="text-center">{{ $tarea->anotaciones_anteriores }}</td>
        </tr>
        <tr>
            <th class="text-center">Anotaciones posteriores</th>
            <td class="text-center">{{ $tarea->anotaciones_posteriores }}</td>
        </tr>
        <tr>
            <th class="text-center">Fichero</th>
            <td class="text-center"></td>
        </tr>
        <tr>
            <th class="text-center">Foto</th>
            <td class="text-center"></td>
        </tr>
        <tr>
            <td colspan="3" class="text-center">
                <a href="{!! route('tareas.index') !!}" class="btn btn-outline-secondary d-inline-flex align-items-center">Volver atrás</a>
                @if (auth()->user()->isAdmin())
                    <a href="{{ route('tareas.edit', ['tarea' => $tarea]) }}" class="btn btn-outline-primary d-inline-flex align-items-center">Modificar</a>
                    <a href="{!! route('confirmar.eliminar.tarea', ['tarea' => $tarea]) !!}" class="btn btn-outline-danger d-inline-flex align-items-center">Borrar</a>
                @endif
                @if (auth()->user()->isOperario() && ($tarea->estado == 'P' || $tarea->estado == 'B'))
                     <a href="{!! route('completar.tarea', ['tarea' => $tarea]) !!}" class="btn btn-outline-success">Completar tarea</a>
                @endif
            </td>
        </tr>
    </tbody>
</table>
@endsection
