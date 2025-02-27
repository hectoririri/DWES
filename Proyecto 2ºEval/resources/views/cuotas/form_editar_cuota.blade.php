@extends('layouts/plantilla')
@section('title', 'Formulario De Modificación De Cuota')
@section('cuerpo')
<form method="POST" action="{{route('cuotas.update', compact('cuota'))}}" enctype="multipart/form-data">
    @method('PUT')
    
    <h2>Formulario edición de cuota</h2>
    @include('cuotas.form_campos_cuota')
    
    <div class="form-group">
        <label for="fecha_pago">Fecha Pago*</label>
        @error('fecha_pago')
            <br>
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input type="datetime-local" class="form-control" name="fecha_pago" id="fecha_pago" value="{{ old('fecha_pago', $cuota->fecha_pago) }}">
    </div>
    <div class="form-group">
        <label for="pagada">Pagada*</label>
        @error('pagada')
            <br>
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="form-check">
            <input type="radio" class="form-check-input" name="pagada" value="A" id="pagada_S" @if(old('pagada', $cuota->pagada) == 'A') checked @endif>
            <label class="form-check-label" for="pagada_S">Sí</label>
        </div>
        <div class="form-check">
            <input type="radio" class="form-check-input" name="pagada" value="O" id="pagada_N" @if(old('pagada', $cuota->pagada) == 'O') checked @endif>
            <label class="form-check-label" for="pagada_N">No</label>
        </div>
    </div>

    <a href="{{ route('usuarios.index') }}" class="btn btn-outline-secondary d-inline-flex align-items-center">Cancelar</a>
    <button type="submit" class="btn btn-primary d-inline-flex align-items-center">Enviar</button>
    <br> <br>
</form>
@endsection