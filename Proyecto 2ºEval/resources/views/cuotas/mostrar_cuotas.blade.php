@extends('layouts.plantilla')
@section('title', 'Listado de Cuotas')
@section('cuerpo')
<h1 class="text-center">Lista Cuotas</h1>



@php
    use App\Models\Usuario;
    use App\Models\Cliente;
@endphp

@if ($cuotas->isNotEmpty())
<table class="table table-striped table-bordered">
    <thead class="thead-dark">
        <tr class="text-center">
            <th>ID</th>
            <th>Concepto</th>
            <th>Fecha Emisión</th>
            <th>Importe</th>
            <th>Pagada</th>
            <th>Fecha Pago</th>
            <th>Notas</th>
            <th>Cliente</th>
            <th colspan="3">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($cuotas as $cuota)
            <tr class="text-center">
                <td>{{ $cuota->id }}</td>
                <td>{{ $cuota->concepto }}</td>
                <td>{{ $cuota->fecha_emision }}</td>
                <td>{{ $cuota->importe }}</td>
                <td>
                    @if ($cuota->pagada == 1)
                        <span class="">Pagada</span>
                    @else
                        <span class="">No pagada</span>
                    @endif
                </td>
                <td>{{ $cuota->fecha_pago }}</td>
                <td>{{ $cuota->notas }}</td>
                <td>{{ $cuota->cliente->nombre }}</td>
                <td>
                    <a href="{!! route("cuotas.show", ['cuota' => $cuota]) !!}" class="btn btn-outline-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-square" viewBox="0 0 16 16">
                            <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
                            <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0"/>
                        </svg>
                    </a>
                </td>
                <td>
                    <a href="{!! route("cuotas.edit", ['cuota' => $cuota]) !!}" class="btn btn-outline-secondary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                        </svg>
                    </a>
                </td>
                <td>
                    <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#cuotaModal{{ $cuota->id }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                        </svg>
                    </button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@else
<h2>No tienes cuotas asignadas</h2>
@endif
<!-- Modal for displaying quota details -->
@foreach ($cuotas as $cuota)
<div class="modal fade" id="cuotaModal{{ $cuota->id }}" tabindex="-1" aria-labelledby="cuotaModalLabel{{ $cuota->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cuotaModalLabel{{ $cuota->id }}">Detalles de la Cuota #{{ $cuota->id }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <h3>¿Está seguro de que desea eliminar la siguiente cuota?</h1>
                    </div>
                    <div class="col-md-6">
                        <p><b>Concepto:</b> {{ $cuota->concepto }}</p>
                        <p><b>Fecha Emisión:</b> {{ $cuota->fecha_emision }}</p>
                        <p><b>Importe:</b> {{ $cuota->importe }}</p>
                        <p><b>Estado:</b> 
                            @if ($cuota->pagada == 1)
                                <span class="text-success">Pagada</span>
                            @else
                                <span class="text-danger">No pagada</span>
                            @endif
                        </p>
                    </div>
                    <div class="col-md-6">
                        <p><b>Fecha Pago:</b> {{ $cuota->fecha_pago ?: 'No pagada' }}</p>
                        <p><b>Cliente:</b> {{ $cuota->cliente->nombre }}</p>
                        <p><b>Notas:</b> {{ $cuota->notas ?: 'Sin notas' }}</p>
                    </div>
                </div>
            </div>
            <form method="POST" action="{{ route('cuotas.destroy', ['cuota' => $cuota]) }}">
                @method('DELETE')
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" name="boton" class="btn btn-danger d-inline-flex align-items-center">Eliminar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

<div class="d-flex justify-content-center mt-4">
    {{ $cuotas->links('pagination::bootstrap-4') }}
</div>
<div class="d-flex justify-content-center mt-4">
    <p>Página {{ $cuotas->currentPage() }} de {{ $cuotas->lastPage() }}</p>
</div>

<a href="{!! route('cuotas.index') !!}" class="btn btn-outline-secondary d-inline-flex align-items-center">Mostrar por defecto</a>
@endsection
