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
                <a href="{!! miurl("mostrar/tareas") !!}" class="btn btn-outline-secondary d-inline-flex align-items-center">Volver atrás</a>
                    <a href="{!! miurl("modificar/tarea/{$tarea->id}") !!}" class="btn btn-outline-primary d-inline-flex align-items-center">Modificar</a>
                    <a href="{!! miurl("borrar/tarea/{$tarea->id}") !!}" class="btn btn-outline-danger d-inline-flex align-items-center">Borrar</a>
                    <a href="{!! miurl("completar/tarea/{$tarea->id}") !!}" class="btn btn-outline-success">Completar tarea</a>
            </td>
        </tr>
    </tbody>
</table>
@endsection
