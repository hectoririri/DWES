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
            <td colspan="4" class="text-center">
                <a href="{!! route('tareas.index') !!}" class="btn btn-outline-secondary d-inline-flex align-items-center justify-content-center w-25">Volver atrás</a>
                @if (auth()->user()->isAdmin())
                    <a href="{{ route('tareas.edit', ['tarea' => $tarea]) }}" class="btn btn-outline-primary d-inline-flex align-items-center justify-content-center w-25">Modificar</a>
                    <button type="button" class="btn btn-outline-danger d-inline-flex align-items-center justify-content-center w-25" data-toggle="modal" data-target="#deleteModal">Borrar</button>
                    {{-- <a href="{!! route('confirmar.eliminar.tarea', ['tarea' => $tarea]) !!}" class="btn btn-outline-danger d-inline-flex align-items-center justify-content-center w-25">Borrar</a> --}}
                @endif
                @if (auth()->user()->isOperario() && ($tarea->estado == 'P' || $tarea->estado == 'B'))
                     <a href="{!! route('completar.tarea', ['tarea' => $tarea]) !!}" class="btn btn-outline-success">Completar tarea</a>
                @endif
            </td>
        </tr>
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
            <td class="text-center" colspan="2">{{ $tarea->getProvincia->nombre }}</td>
        </tr>
        <tr>
            <th class="text-center" colspan="2">Estado</th>
            <td colspan="2">
                @if ($tarea->estado == 'R')
                    <span class="bg-success text-white p-2 rounded">Realizado</span>
                @elseif ($tarea->estado == 'C')
                    <span class="bg-danger text-white p-2 rounded">Cancelado</span>
                @elseif ($tarea->estado == 'P')
                    <span class="bg-warning text-white p-2 rounded">Pendiente</span>
                @elseif ($tarea->estado == 'B')
                    <span class="bg-primary text-white p-2 rounded">Por aprobar</span>
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
            <td class="text-center" colspan="2">{{ $tarea->usuario == null ? 'Operario no asignado' : $tarea->usuario->name }}</td>
            {{-- <td class="text-center"><a href="{!! route("usuarios.show", ['usuario' => $tarea->operario_id]) !!}" target="_blank">{{ Usuario::find($tarea->operario_id)->name }} </a> || {{ Usuario::find($tarea->operario_id)->email }}</td> --}}
        </tr>
        <tr>
            <th class="text-center" colspan="2">Cliente</th>
            <td class="text-center" colspan="2">{{ $tarea->cliente == null ? 'Cliente no asignado' : $tarea->cliente->nombre }}</td>
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
                    <img class="img-fluid sm" src="{{ $tarea->getFotoUrlAttribute() }}" alt="{{ $tarea->foto }}" />
                @else
                    No hay foto disponible
                @endif
            </td>
        </tr>
    </tbody>
</table>

  <!-- Modal -->
  <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteModalLabel">¿Está seguro de que desea eliminar la tarea {{$tarea->id}}?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <table>
            <thead>
                <th>Descripción</th>
                <th>Dirección</th>
                <th>Estado</th>
                <th>Operario</th>
                <th>Cliente</th>
            </thead>
            <tbody>
                <tr>
                    <td>{{$tarea->descripcion}}</td>
                </tr>
            </tbody>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <a href="{{route('tareas.index')}}" class="btn btn-danger">Borrar</a>
        </div>
      </div>
    </div>
  </div>
@endsection
