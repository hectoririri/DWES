@extends('layouts/plantilla')
@section('title', 'Formulario De Modificación De Cuota')
@section('cuerpo')
<form method="POST" action="{{route('cuotas.update', compact('cuota'))}}" enctype="multipart/form-data">
    @method('PUT')
    
    <h2>Formulario edición de cuota</h2>
    @include('cuotas.form_campos_cuota')
    
    <div class="form-group">
        <label for="fecha_pago">Fecha Pago</label>
        @error('fecha_pago')
            <br>
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input disabled type="datetime-local" class="form-control" name="fecha_pago" id="fecha_pago" value="{{ old('fecha_pago', $cuota->fecha_pago) }}">
    </div>

    <a href="{{ route('cuotas.index') }}" class="btn btn-outline-secondary d-inline-flex align-items-center">Cancelar</a>
    <button type="submit" class="btn btn-primary d-inline-flex align-items-center">Editar cuota</button>
    <br> <br>
</form>
@endsection