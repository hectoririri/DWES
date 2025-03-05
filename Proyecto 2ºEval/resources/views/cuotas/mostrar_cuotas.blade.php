@extends('layouts.plantilla')
@section('title', 'Listado de Cuotas')
@section('cuerpo')
<h1 class="text-center">Lista Cuotas</h1>
@php
    use App\Models\Usuario;
    use App\Models\Cliente;
@endphp

@if ($cuotas->isNotEmpty())
<div class="mb-3">
    <form action="{{ route('cuotas.index') }}" method="GET" class="d-flex align-items-center" id="clienteFilterForm">
        <label for="cliente_id" class="mr-2">Filtrar por cliente:</label>
        <select name="cliente_id" id="cliente_id" class="form-select me-2" style="width: auto;" onchange="submitForm(this.value)">
            <option value="" selected>Todos los clientes</option>
            @foreach(Cliente::all() as $cliente)
                <option value="{{ $cliente->id }}" {{ request('cliente_id') == $cliente->id ? 'selected' : '' }}>
                    {{ $cliente->nombre }}
                </option>
            @endforeach
        </select>
    </form>
</div>

<script>
function submitForm(clienteId) {
    const form = document.getElementById('clienteFilterForm');
    if (clienteId) {
        form.action = "{{ url('/cuotas/cliente') }}/" + clienteId;
    } else {
        form.action = "{{ route('cuotas.index') }}";
    }
    form.submit();
}
</script>

<table class="table table-striped table-bordered">
    <thead class="thead-dark">
        <tr class="text-center">
            <th>ID</th>
            <th>Concepto</th>
            <th>Fecha Emisión</th>
            <th>Importe</th>
            <th>Fecha Pago</th>
            <th>Notas</th>
            <th>Cliente</th>
            <th colspan="5">Acciones</th>
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
                    @if ($cuota->fecha_pago != null)
                        Pagada el <span class="text-success"><b>{{$cuota->fecha_pago}}</b></span>
                    @else
                        <span class="text-danger">No pagada</span>
                    @endif
                </td>
                <td>{{ $cuota->notas }}</td>
                <td>{{ $cuota->cliente->nombre }}</td>
                <td>
                    <a href="{!! route("cuotas.show", ['cuota' => $cuota]) !!}" class="btn btn-outline-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-square" viewBox="0 0 16 16">
                            <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
                            <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0"/>
                        </svg>
                        Información
                    </a>
                </td>
                <td>
                    <a href="{!! route("cuotas.edit", ['cuota' => $cuota]) !!}" class="btn btn-outline-secondary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                        </svg>
                        Editar
                    </a>
                </td>
                <td>
                    <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#cuotaModal{{ $cuota->id }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                        </svg>
                        Eliminar
                    </button>
                </td>
                <td>
                    <a href="{{ route('cuotas.pdf', $cuota) }}" class="btn btn-outline-warning" target="_blank">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-pdf" viewBox="0 0 16 16">
                            <path d="M4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm0 1h8a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1"/>
                            <path d="M4.603 12.087a.8.8 0 0 1-.438-.42c-.195-.388-.13-.776.08-1.102.198-.307.526-.568.897-.787a7.7 7.7 0 0 1 1.482-.645 20 20 0 0 0 1.062-2.227 7.3 7.3 0 0 1-.43-1.295c-.086-.4-.119-.796-.046-1.136.075-.354.274-.672.65-.823.192-.077.4-.12.602-.077a.7.7 0 0 1 .477.365c.088.164.12.356.127.538.007.187-.012.395-.047.614-.084.51-.27 1.134-.52 1.794a11 11 0 0 0 .98 1.686 5.8 5.8 0 0 1 1.334.05c.364.065.734.195.96.465.12.144.193.32.2.518.007.192-.047.382-.138.563a1.04 1.04 0 0 1-.354.416.86.86 0 0 1-.51.138c-.331-.014-.654-.196-.933-.417a5.7 5.7 0 0 1-.911-.95 11.6 11.6 0 0 0-1.997.406 11.3 11.3 0 0 1-1.021 1.51c-.29.35-.608.655-.926.787a.8.8 0 0 1-.58.029m1.379-1.901q-.25.115-.459.238c-.328.194-.541.383-.647.547-.094.145-.096.25-.04.361q.016.032.026.044l.035-.012c.137-.056.355-.235.635-.572a8.2 8.2 0 0 0 .45-.606m1.64-1.33a13 13 0 0 1 1.01-.193 12 12 0 0 0-.51-.858 21 21 0 0 1-.5 1.05zm2.446.45q.226.244.435.41c.24.19.407.253.498.256a.1.1 0 0 0 .07-.015.3.3 0 0 0 .094-.125.44.44 0 0 0 .059-.2.1.1 0 0 0-.026-.063c-.052-.062-.2-.152-.518-.209a4 4 0 0 0-.612-.053zM8.078 5.8a7 7 0 0 0 .2-.828q.046-.282.038-.465a.6.6 0 0 0-.032-.198.5.5 0 0 0-.145.04c-.087.035-.158.106-.196.283-.04.192-.03.469.046.822q.036.167.09.346z"/>
                        </svg>
                        Generar PDF
                    </a>
                </td>
                @if($cuota->fecha_pago == null)
                <td>
                    <a href="{{ route('payment', ['cantidad' => $cuota->importe]) }}" class="btn btn-outline-info">
                        Pagar con PayPal
                        <i class="fab fa-paypal ms-2"></i>
                    </a>
                </td>
                @endif
            </tr>
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
    </tbody>
</table>
@else
<h2>No tienes cuotas asignadas</h2>
@endif

<div class="d-flex justify-content-center mt-4">
    {{ $cuotas->links('pagination::bootstrap-4') }}
</div>
<div class="d-flex justify-content-center mt-4">
    <p>Página {{ $cuotas->currentPage() }} de {{ $cuotas->lastPage() }}</p>
</div>
@endsection
