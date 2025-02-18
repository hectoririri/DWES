@extends('layouts.plantilla')
@section('title', 'Listado de Clientes')
@section('cuerpo')
<h1>Lista Clientes</h1>

@if (session('mensaje'))
<div class="alert alert-success">
    {{ session('mensaje') }}
</div>
@endif

@php
    use App\Models\Usuario;
    use App\Models\Cliente;
    use App\Models\Pais;
@endphp

<table class="table table-striped table-bordered">
    <thead class="thead-dark">
        <tr class="text-center">
            <th>Cif</th>
            <th>Nombre</th>
            <th>Telefono</th>
            <th>Correo</th>
            <th>Moneda</th>
            <th>Importe Mensual</th>
            <th>Importe Mensual a Euros</th>
            <th>Ver más</th>
            <th>Editar</th>
            <th>Borrar</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($clientes as $cliente)
            <tr class="text-center">
                <td>{{ $cliente->cif }}</td>
                <td>{{ $cliente->nombre }}</td>
                <td>{{ $cliente->telefono }}</td>
                <td>{{ $cliente->correo }}</td>
                <td>{{ $cliente->moneda }}</td>
                <td>{{ $cliente->importe_mensual }}</td>
                <td>importe mensual a euros (conversion)</td>
                <td>
                    <a href="{!! route("clientes.show", ['cliente' => $cliente]) !!}" class="btn btn-outline-primary w-100">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-square" viewBox="0 0 16 16">
                            <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
                            <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0"/>
                        </svg>
                    </a>
                </td>
                <td>
                    <a href="{!! route("clientes.edit", ['cliente' => $cliente]) !!}" class="btn btn-outline-secondary w-100">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                        </svg>
                    </a>
                </td>
                <td>
                    <a href="{!! route('confirmar.eliminar.cliente', ['cliente' => $cliente]) !!}" class="btn btn-outline-danger w-100">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                        </svg>
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<div class="d-flex justify-content-center mt-4">
    {{ $clientes->links('pagination::bootstrap-4') }}
</div>
<div class="d-flex justify-content-center mt-4">
    <p>Página {{ $clientes->currentPage() }} de {{ $clientes->lastPage() }}</p>
</div>

{{-- <a href="{!! route('clientes.operario_eliminado') !!}" class="btn btn-outline-danger d-inline-flex align-items-center">Mostrar clientes con operario eliminado</a> --}}
@endsection

