@extends('layouts/plantilla')
@section('title', 'Eliminar cliente')
@section('cuerpo')
<form method="POST" action="{{route('clientes.destroy', ['cliente' => $cliente])}}">
    @method('DELETE')
    <h2>¿Está seguro de que desea eliminar al siguiente cliente?</h2>
    <table class="table table-hover table-bordered">
        <tbody>
            <tr class="table-secondary">
                <th class="text-center">ID</th>
                <td class="text-center">{!!$cliente->id!!}</td>
            </tr>
            <tr class="table-secondary">
                <th class="text-center">Nombre</th>
                <td class="text-center">{!!$cliente->nombre!!}</td>
            </tr>
            <tr class="table-secondary">
                <th class="text-center">Correo</th>
                <td class="text-center">{!!$cliente->correo!!}</td>
            </tr>
            <tr class="table-secondary">
                <th class="text-center">Cuenta Corriente</th>
                <td class="text-center">{!!$cliente->cuenta_corriente!!}</td>
            </tr>
            <tr class="table-secondary">
                <th class="text-center">Pais</th>
                <td class="text-center">{!!$cliente->pais!!}</td>
            </tr>
            <tr class="table-secondary">
                <th class="text-center">Moneda</th>
                <td class="text-center">{!!$cliente->moneda!!}</td>
            </tr>
            <tr class="table-secondary">
                <th class="text-center">Importe Mensual</th>
                <td class="text-center">{!!$cliente->importe_mensual!!}</td>
            </tr>
            <tr class="table-secondary">
                <th class="text-center">Fecha creación</th>
                <td class="text-center">{!!$cliente->fecha_creacion!!}</td>
            </tr>
        </tbody>
    </table>
    <a href="{{ route('clientes.index') }}" class="btn btn-outline-secondary d-inline-flex align-items-center">Cancelar</a>
    <button type="submit" name="boton" class="btn btn-danger d-inline-flex align-items-center">Eliminar</button>
</form>
@endsection