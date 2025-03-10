@extends('layouts.plantilla')
@section('title', 'Listado de Cuotas')
@section('cuerpo')
<h1 class="text-center">Información de Cuota Nº{{ $cuota->id }}</h1>

@if (session('mensaje'))
<div class="alert alert-success">
    {{ session('mensaje') }}
</div>
@endif

<table class="table table-striped table-bordered">
    <tbody>
        <tr>
            <td class="text-center" colspan="2">
                <a href="{!! route("cuotas.edit", ['cuota' => $cuota]) !!}" class="btn btn-outline-secondary w-25">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                    </svg>
                </a>
                <!-- Delete button that triggers modal -->
                <button type="button" class="btn btn-outline-danger w-25" data-bs-toggle="modal" data-bs-target="#deleteModal">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                        <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                    </svg>
                </button>
            </td>
        </tr>
        <tr>
            <th class="text-center">ID</th>
            <td class="text-center" colspan="2">{{ $cuota->id }}</td>
        </tr>
        <tr>
            <th class="text-center">Concepto</th>
            <td class="text-center" colspan="2">{{ $cuota->concepto }}</td>
        </tr>
        <tr>
            <th class="text-center">Fecha de Emisión</th>
            <td class="text-center" colspan="2">{{ $cuota->fecha_emision }}</td>
        </tr>
        <tr>
            <th class="text-center">Importe</th>
            <td class="text-center" colspan="2">{{ $cuota->importe }}</td>
        </tr>
        <tr>
            <th class="text-center">Fecha de Pago</th>
            <td class="text-center">
                @if ($cuota->fecha_pago != null)
                    Pagada el <span class="text-success"><b>{{$cuota->fecha_pago}}</b></span>
                @else
                    <span class="text-danger">No pagada</span>
                @endif
            </td>
        </tr>
        <tr>
            <th class="text-center">Notas</th>
            @if ($cuota->notas == null)
                <td class="text-center" colspan="2">Sin notas</td>
            @else
                <td class="text-center" colspan="2">{{ $cuota->notas }}</td>
            @endif
        </tr>
        <tr>
            <th class="text-center">Cliente</th>
            <td class="text-center" colspan="2">{{ $cuota->cliente->nombre }}</td>
        </tr>
        <tr>
            <td class="text-center" colspan="2">
                <a href="{{ route('cuotas.index') }}" class="btn btn-outline-primary text-center w-10">
                    Volver Atrás
                </a>
                @if($cuota->fecha_pago == null)
                <a href="{{ route('payment', ['cantidad' => $cuota->importe, 'cuota_id' => $cuota->id]) }}" class="btn btn-outline-info">
                    Pagar con PayPal
                    <i class="fab fa-paypal ms-2 w-25"></i>
                </a>
                @endif
            </td>
        </tr>
    </tbody>
</table>
 <!-- Delete Confirmation Modal -->
 <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Confirmar Eliminación</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
            </div>
            <div class="modal-body">
                ¿Está seguro que desea eliminar la cuota Nº{{ $cuota->id }}?
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
@endsection
