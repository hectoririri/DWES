@extends('layouts/plantilla')
@section('title', 'Formulario De Creacion de Cuota')
@section('cuerpo')
<form method="POST" action="{{route('cuotas.store')}}" enctype="multipart/form-data">

    <h2>Formulario de creación de cuota</h2>

    @include('cuotas.form_campos_cuota')

    <a href="{{ route('cuotas.index') }}" class="btn btn-outline-secondary d-inline-flex align-items-center">Cancelar</a>
    <button type="submit" class="btn btn-primary d-inline-flex align-items-center">Enviar</button>
    <br> <br>
</form>
@endsection