@extends('layouts.plantilla')
@section('title', 'Listado de Remesas')
@section('cuerpo')
<h1 class="text-center">Lista Remesas</h1>

<a href="{!! route("remesas.create") !!}"  class="btn btn-primary w-100 my-2 p-3 text-center">Crear Remesa</a>

@if ($remesas->isNotEmpty())
<table class="table table-striped table-bordered">
    <thead class="thead-dark">
        <tr class="text-center">
            <th>ID</th>
            <th>Fecha</th>
            <th>Motivo</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($remesas as $remesa)
            <tr class="text-center">
                <td>{{ $remesa->id }}</td>
                <td>{{ $remesa->fecha }}</td>
                @if ($remesa->motivo == null)
                    <td>Motivo no especificado</td>
                @else
                    <td>{{ $remesa->motivo }}</td>
                @endif
            </tr>
        @endforeach
    </tbody>
</table>
@else
<h2>No tienes remesas creadas</h2>
@endif

<div class="d-flex justify-content-center mt-4">
    {{ $remesas->links('pagination::bootstrap-4') }}
</div>
<div class="d-flex justify-content-center mt-4">
    <p>Página {{ $remesas->currentPage() }} de {{ $remesas->lastPage() }}</p>
</div>
@endsection
