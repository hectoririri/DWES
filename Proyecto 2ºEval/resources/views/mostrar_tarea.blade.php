@extends('layout/plantilla')
@section('title', 'Detalles de la tarea')
@section('cuerpo')
<h1 class="text-center">Detalles de la tarea Nº{{$tarea->id}}</h1>
<table class="table table-striped table-bordered text-center">
    <tbody>
        @foreach($tarea->toArray() as $index => $valor)
            @if(!in_array($index, ['id', 'cliente_id']))
            <tr>
                <th class="text-center">{{ $index }}</th>
                <td class="text-center">{{ $valor }}</td>
            </tr>
            @endif
        @endforeach
        <tr>
            <td colspan="3" class="text-center">
                <a href="{!! route('tareas.index') !!}" class="btn btn-outline-secondary d-inline-flex align-items-center">Volver atrás</a>
                {{-- @if (\App\Models\SesionUsuario::getInstance()->isAdmin()) --}}
                    {{-- <a href="{{ route('modificar_tarea', ['id' => $tarea->id]) }}" class="btn btn-outline-primary d-inline-flex align-items-center">Modificar</a> --}}
                    <a href="{!! route('confirmar.eliminar.tarea', ['tarea' => $tarea->id]) !!}" class="btn btn-outline-danger d-inline-flex align-items-center">Borrar</a>
                {{-- @endif --}}
                {{-- @if (\App\Models\SesionUsuario::getInstance()->isAdmin() && ($tarea['estado'] == 'P' || $tarea['estado'] == 'B')) --}}
                    {{-- <a href="{!! route('completar_tarea', ['id' => $tarea->id]) !!}" class="btn btn-outline-success">Completar tarea</a> --}}
                {{-- @endif --}}
            </td>
        </tr>
    </tbody>
</table>
@endsection
