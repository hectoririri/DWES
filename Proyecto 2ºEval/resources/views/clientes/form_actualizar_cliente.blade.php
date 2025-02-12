@extends('layout/plantilla')
@section('title', 'Formulario actualización cliente')
@section('cuerpo')
<form method="POST" action="{{route('clientes.update', ['cliente'=>$cliente])}}" enctype="multipart/form-data" class="bg-light p-4 rounded">
    @method('PATCH')
    <h1 class="text-primary text-center mb-5">Actualizando cliente</h1>

    {{-- Añadimos campos comunes --}}
    @include('clientes.form_campos_cliente')

    <a href="{{ route('clientes.index') }}" class="btn btn-outline-secondary">Cancelar</a>
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>
@endsection