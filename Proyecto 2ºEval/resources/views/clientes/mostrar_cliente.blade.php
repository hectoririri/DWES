@extends('layouts/plantilla')
@section('title', 'Detalles del cliente')
@section('cuerpo')
@php
    use App\Models\Usuario;
    use App\Models\Cliente;
@endphp
<h1 class="text-center">Detalles del cliente {{$cliente->name}}</h1>
@if (session('mensaje'))
    <div class="alert alert-success">
        {{ session('mensaje') }}
    </div>
@endif
<table class="table table-striped table-bordered text-center">
    <tbody>
        <tr>
            <th class="text-center">Cif</th>
            <td class="text-center">{{ $cliente->cif }}</td>
        </tr>
        <tr>
            <th class="text-center">Nombre</th>
            <td class="text-center">{{ $cliente->nombre }}</td>
        </tr>
        <tr>
            <th class="text-center">Teléfono</th>
            <td class="text-center">{{ $cliente->telefono }}</td>
        </tr>
        <tr>
            <th class="text-center">Correo</th>
            <td class="text-center">{{ $cliente->correo }}</td>
        </tr>
        <tr>
            <th class="text-center">Pais</th>
            <td class="text-center">{{ $cliente->pais }}</td>
        </tr>
        <tr>
            <th class="text-center">Cuenta Corriente</th>
            <td class="text-center">{{ $cliente->cuenta_corriente }}</td>
        </tr>
        <tr>
            <th class="text-center">Moneda</th>
            <td class="text-center">{{ $cliente->moneda }}</td>
        </tr>
        <tr>
            <th class="text-center">Cambio a Euros</th>
            <td class="text-center"></td>
        </tr>
        <tr>
            <th class="text-center">Importe Mensual</th>
            <td class="text-center">{{ $cliente->importe_mensual }}</td>
        </tr>
        <tr>
            <th class="text-center">Cambio a euros</th>
            <td class="text-center"></td>
        </tr>
        <tr>
            <th class="text-center">Fecha alta</th>
            <td class="text-center">{{ $cliente->fecha_alta }}</td>
        </tr>
        @if($cliente->fecha_actualizado != null)
        <tr>
            <th class="text-center">Fecha actualizado</th>
            <td class="text-center">{{ $cliente->fecha_actualizado }}</td>
        </tr>
        @endif
        <tr>
            <td colspan="3" class="text-center">
                <a href="{!! route('clientes.index') !!}" class="btn btn-outline-secondary d-inline-flex align-items-center">Volver atrás</a>
                <a href="{!! route('clientes.edit', ['cliente' => $cliente]) !!}" class="btn btn-outline-primary d-inline-flex align-items-center">Modificar</a>
                <a href="{!! route('confirmar.eliminar.cliente', ['cliente' => $cliente]) !!}" class="btn btn-outline-danger d-inline-flex align-items-center">Borrar</a>
            </td>
        </tr>
    </tbody>
</table>
@endsection
