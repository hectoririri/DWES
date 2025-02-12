@extends('layouts/plantilla')
@section('title', 'Formulario creación cliente')
@section('cuerpo')
<form method="POST" action="{{route('clientes.store')}}" enctype="multipart/form-data" class="bg-light p-4 rounded">
    <h1 class="text-primary text-center mb-5">Creando cliente</h1>

    {{-- Añadimos campos comunes --}}
    @include('clientes.form_campos_cliente')

    <a href="{{ route('clientes.index') }}" class="btn btn-outline-secondary">Cancelar</a>
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>
@endsection