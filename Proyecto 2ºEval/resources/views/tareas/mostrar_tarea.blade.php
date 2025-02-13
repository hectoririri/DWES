@extends('layouts/plantilla')
@section('title', 'Detalles de la tarea')
@section('cuerpo')
@php
    use App\Models\Usuario;
    use App\Models\Cliente;
    use App\Models\Provincia;
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
            <th class="text-center" colspan="2">Descripción</th>
            <td class="text-center" colspan="2">{{ $tarea->descripcion }}</td>
        </tr>
        <tr>
            <th class="text-center" colspan="2">Dirección</th>
            <td class="text-center"  colspan="2">{{ $tarea->direccion }}</td>
        </tr>
        <tr>
            <th class="text-center" colspan="2">Población</th>
            <td class="text-center" colspan="2">{{ $tarea->poblacion }}</td>
        </tr>
        <tr>
            <th class="text-center" colspan="2">Código postal</th>
            <td class="text-center" colspan="2">{{ $tarea->cod_postal }}</td>
        </tr>
        <tr>
            <th class="text-center" colspan="2">Provincia</th>
            <td class="text-center" colspan="2">{{ Provincia::find($tarea->provincia)->nombre }}</td>
        </tr>
        <tr>
            <th class="text-center" colspan="2">Estado</th>
            <td colspan="2">
                @if ($tarea->estado == 'R')
                    Realizado
                @elseif ($tarea->estado == 'C')
                    Cancelado
                @elseif ($tarea->estado == 'P')
                    Pendiente
                @elseif ($tarea->estado == 'B')
                    Por aprobar
                @endif
            </td>
        </tr>
        <tr>
            <th class="text-center" colspan="2">Fecha de creación</th>
            <td class="text-center" colspan="2">{{ $tarea->fecha_creacion }}</td>
        </tr>
        <tr>
            <th class="text-center" colspan="2">Fecha de realización</th>
            <td class="text-center" colspan="2">@if ($tarea->fecha_realizacion == null) No realizada aún @else {{ $tarea->fecha_realizacion }} @endif</td>
        </tr>
        <tr>
            <th class="text-center" colspan="2">Fecha de actualización</th>
            <td class="text-center" colspan="2"> @if ($tarea->fecha_actualizacion == null) No actualizado aún @else {{ $tarea->fecha_actualizacion }} @endif </td>
        </tr>
        <tr>
            <th class="text-center" colspan="2">Operario</th>
            <td class="text-center" colspan="2">{{ $tarea->operario_id }}</td>
            {{-- <td class="text-center"><a href="{!! route("usuarios.show", ['usuario' => $tarea->operario_id]) !!}" target="_blank">{{ Usuario::find($tarea->operario_id)->name }} </a> || {{ Usuario::find($tarea->operario_id)->email }}</td> --}}
        </tr>
        <tr>
            <th class="text-center" colspan="2">Cliente</th>
            <td class="text-center" colspan="2">{{ $tarea->operario_id }}</td>
            {{-- <td class="text-center"><a href="{!! route("cliente.show", ['cliente' => Cliente::find($tarea->cliente_id)]) !!}" target=”_blank”>{{ Cliente::find($tarea->cliente_id)->name }} </a> || {{ Cliente::find($tarea->cliente_id)->email }}</td> --}}
        </tr>
        <tr>
            <th class="text-center" colspan="2">Anotaciones anteriores</th>
            <td class="text-center" colspan="2">{{ $tarea->anotaciones_anteriores }}</td>
        </tr>
        <tr>
            <th class="text-center" colspan="2">Anotaciones posteriores</th>
            <td class="text-center" colspan="2">{{ $tarea->anotaciones_posteriores }}</td>
        </tr>
        <tr>
            <th class="text-center align-middle">Fichero</th>
            <td class="text-center align-middle">
                @if ($tarea->fichero)
                    <iframe width="380" height="550" src="{{ $tarea->getTareaUrlAttribute() }}" frameborder="2"></iframe>
                    <br>
                    <a target="_blank" href="{{ $tarea->getTareaUrlAttribute() }}">Abrir en otra pestaña</a>
                    <p><a href="{{ $tarea->getTareaUrlAttribute() }}" download>Descargar</a></p>
                @else
                    No hay fichero disponible
                @endif
            </td>
            {{-- https://icon666.com/search?q=download --}}
            
            <th class="text-center align-middle">Foto</th>
            <td class="text-center align-middle">
                @if ($tarea->foto)
                    <img width="380" height="550" src="{{ $tarea->getFotoUrlAttribute() }}" alt="{{ $tarea->foto }}" />
                @else
                    No hay foto disponible
                @endif
            </td>
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
