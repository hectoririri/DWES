@extends('layout/plantilla')
@section('title', 'Formulario')
@section('cuerpo')
<form method="{{$method}}" action="{{route($action)}}" enctype="multipart/form-data" class="bg-light p-4 rounded">
    <h2 class="text-secondary">{{$titulo}} tarea</h2>

    <div class="form-group">
        <label for="nif/cif">NIF o CIF*</label>
        <input type="text" class="form-control" name="nif_cif" id="nif/cif" value="{{ old('nif_cif') }}">
    </div>

    <div class="form-group">
        <label for="nombre">Nombre*</label>
        <input type="text" class="form-control" name="nombre" id="nombre" value="{{ old('nombre') }}">
    </div>

    <div class="form-group">
        <label for="apellidos">Apellidos*</label>
        <input type="text" class="form-control" name="apellidos" id="apellidos" value="{{ old('apellidos') }}">
    </div>

    <div class="form-group">
        <label for="telefono_contacto">Teléfono de contacto*</label>
        <input type="text" class="form-control" name="telefono" id="telefono_contacto" value="{{ old('telefono') }}">
    </div>

    <div class="form-group">
        <label for="descripcion">Descripción identificativa de la tarea*</label>
        <textarea class="form-control" name="descripcion" id="descripcion">{{ old('descripcion') }}</textarea>
    </div>

    <div class="form-group">
        <label for="correo">Correo electrónico*</label>
        <input type="text" class="form-control" name="correo" id="correo" value="{{ old('correo') }}">
    </div>

    <div class="form-group">
        <label for="direccion">Dirección donde hay que ir a realizar la tarea</label>
        <input type="text" class="form-control" name="direccion" id="direccion" value="{{ old('direccion') }}">
    </div>

    <div class="form-group">
        <label for="poblacion">Población</label>
        <input type="text" class="form-control" name="poblacion" id="poblacion" value="{{ old('poblacion') }}">
    </div>

    <div class="form-group">
        <label for="cod_postal">Código Postal*</label>
        <input type="text" class="form-control" name="cod_postal" id="cod_postal" value="{{ old('cod_postal') }}">
    </div>

    <div class="form-group">
        <label for="provincia">Provincia*</label>
        <select class="form-control" name="provincia" id="provincia">
            <option value="" selected></option>
           @foreach ($provincias as $provincia)
            <option value="{{$provincia->cod}}" @if(old('provincia') == $provincia->nombre) selected @endif>{{$provincia->nombre}}</option>
           @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="estado">Estado de la tarea</label>
        <div class="form-check">
            <input type="radio" class="form-check-input" name="estado" value="P" id="estado">
            <label class="form-check-label" for="estado" @if(old('estado') == 'P') selected @endif >P (Pendiente)</label>
        </div>
        <div class="form-check">
            <input type="radio" class="form-check-input" name="estado" value="B" id="estado">
            <label class="form-check-label" for="estado" @if(old('estado') == 'B') selected @endif >B (Esperando ser aprobada)</label>
        </div>
        <div class="form-check">
            <input type="radio" class="form-check-input" name="estado" value="R" id="estado">
            <label class="form-check-label" for="estado" @if(old('estado') == 'R') selected @endif >R (Realizada)</label>
        </div>
        <div class="form-check">
            <input type="radio" class="form-check-input" name="estado" value="C" id="estado">
            <label class="form-check-label" for="estado" @if(old('estado') == 'C') selected @endif >C (Cancelada)</label>
        </div>
    </div>

    <div class="form-group">
        <label for="fecha_creacion">Fecha de creación de la tarea</label>
        <input type="date" class="form-control" name="fecha_creacion" id="fecha_creacion" readonly>
    </div>

    {{-- Si es cliente se oculta --}}
    <div class="form-group">
        <label for="operario">Operario encargado*</label>
        <select class="form-control" name="operario" id="operario">
            <option value="" selected></option>
            @foreach ($operarios as $operario)
                <option value="{{$operario->id}}" @if(old('operario') == $operario->nombre) selected @endif >{{$operario->nombre." ".$operario->apellidos}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="fecha_realizacion">Fecha de realización de la tarea*</label>
        <input type="date" class="form-control" name="fecha_realizacion" id="fecha_realizacion" value=" {{ old('fecha_realizacion') }}">
    </div>

    <div class="form-group">
        <label for="anotaciones_anteriores">Anotaciones anteriores</label>
        <textarea class="form-control" name="anotaciones_anteriores" id="anotaciones_anteriores">{{ old('anotaciones_anteriores') }}</textarea>
    </div>

    <div class="form-group">
        <label for="anotaciones_posteriores">Anotaciones posteriores</label>
        <textarea class="form-control" name="anotaciones_posteriores" id="anotaciones_posteriores">{{ old('anotaciones_posteriores') }}</textarea>
    </div>

    <div class="form-group">
        <label for="fichero">Fichero resumen de tareas realizadas</label>
        <input type="file" class="form-control-file" name="fichero_resumen" id="fichero">
    </div>

    <div class="form-group">
        <label for="foto">Fotos del trabajo realizado</label>
        <input type="file" class="form-control-file" name="foto" id="foto">
    </div>

    <a href="{{ route('tareas.index') }}" class="btn btn-outline-secondary">Cancelar</a>
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>
@endsection