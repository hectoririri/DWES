@extends('layout/plantilla')
@section('title', 'Formulario')
@section('cuerpo')
<form method="post" enctype="multipart/form-data" class="bg-light p-4 rounded">
    <h2 class="text-secondary">{{$titulo}} tarea</h2>

    <div class="form-group">
        <label for="nif/cif">NIF o CIF*</label>
        <span class="text-danger">{{ $errores->Error('nif/cif') }}</span>
        <input type="text" class="form-control" name="nif_cif" id="nif/cif" value="{{ ($_POST) ? $utiles->valorPost('nif_cif') : ($tarea['nif_cif'] ?? '') }}" placeholder="12345678Z...">
    </div>

    <div class="form-group">
        <label for="nombre">Nombre*</label>
        <span class="text-danger">{{ $errores->Error('nombre') }}</span>
        <input type="text" class="form-control" name="nombre" id="nombre" value="{{ ($_POST) ? $utiles->valorPost('nombre') : ($tarea['nombre'] ?? '') }}" placeholder="Héctor">
    </div>

    <div class="form-group">
        <label for="apellidos">Apellidos*</label>
        <span class="text-danger">{{ $errores->Error('apellidos') }}</span>
        <input type="text" class="form-control" name="apellidos" id="apellidos" value="{{ ($_POST) ? $utiles->valorPost('apellidos') : ($tarea['apellidos'] ?? '') }}" placeholder="Núñez García">
    </div>

    <div class="form-group">
        <label for="telefono_contacto">Teléfono de contacto*</label>
        <span class="text-danger">{{ $errores->Error('telefono') }}</span>
        <input type="text" class="form-control" name="telefono" id="telefono_contacto" value="{{ ($_POST) ? $utiles->valorPost('telefono') : ($tarea['telefono'] ?? '') }}" placeholder="+34 123456789...">
    </div>

    <div class="form-group">
        <label for="descripcion">Descripción identificativa de la tarea*</label>
        <span class="text-danger">{{ $errores->Error('descripcion') }}</span>
        <textarea class="form-control" name="descripcion" id="descripcion">{{ ($_POST) ? $utiles->valorPost('descripcion') : ($tarea['descripcion'] ?? '') }}</textarea>
    </div>

    <div class="form-group">
        <label for="correo">Correo electrónico*</label>
        <span class="text-danger">{{ $errores->Error('correo') }}</span>
        <input type="text" class="form-control" name="correo" id="correo" value="{{ ($_POST) ? $utiles->valorPost('correo') : ($tarea['correo'] ?? '') }}" placeholder="hola@gmail.com...">
    </div>

    <div class="form-group">
        <label for="direccion">Dirección donde hay que ir a realizar la tarea</label>
        <span class="text-danger">{{ $errores->Error('direccion') }}</span>
        <input type="text" class="form-control" name="direccion" id="direccion" value="{{ ($_POST) ? $utiles->valorPost('direccion') : ($tarea['direccion'] ?? '') }}" placeholder="Calle Falsa 123...">
    </div>

    <div class="form-group">
        <label for="poblacion">Población</label>
        <span class="text-danger">{{ $errores->Error('poblacion') }}</span>
        <input type="text" class="form-control" name="poblacion" id="poblacion" value="{{ ($_POST) ? $utiles->valorPost('poblacion') : ($tarea['poblacion'] ?? '') }}" placeholder="Aljaraque">
    </div>

    <div class="form-group">
        <label for="cod_postal">Código Postal*</label>
        <span class="text-danger">{{ $errores->Error('cod_postal') }}</span>
        <input type="text" class="form-control" name="cod_postal" placeholder="21006..." id="cod_postal" value="{{ ($_POST) ? $utiles->valorPost('cod_postal') : ($tarea['cod_postal'] ?? '') }}">
    </div>

    <div class="form-group">
        <label for="provincia">Provincia*</label>
        <span class="text-danger">{{ $errores->Error('provincia') }}</span>
        <select class="form-control" name="provincia" id="provincia">
            <option value="" selected></option>
            @foreach($objTareas->recogerProvincias() as $provincia)
                <option value="{{ $provincia }}" {{ ($_POST) ? ($utiles->valorPost('provincia') == $provincia ? 'selected' : '') : (($tarea['provincia'] ?? '') == $provincia ? 'selected' : '') }}>{{ $provincia }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="estado">Estado de la tarea</label>
        <span class="text-danger">{{ $errores->Error('estado') }}</span>
        <div class="form-check">
            <input type="radio" class="form-check-input" name="estado" value="P" id="estado" {{ ($_POST) ? ($utiles->valorPost('estado') == 'P' ? 'checked' : '') : (($tarea['estado'] ?? '') == 'P' ? 'checked' : '') }}>
            <label class="form-check-label" for="estado">P (Pendiente)</label>
        </div>
        <div class="form-check">
            <input type="radio" class="form-check-input" name="estado" value="B" id="estado" {{ ($_POST) ? ($utiles->valorPost('estado') == 'B' ? 'checked' : '') : (($tarea['estado'] ?? '') == 'B' ? 'checked' : '') }}>
            <label class="form-check-label" for="estado">B (Esperando ser aprobada)</label>
        </div>
        <div class="form-check">
            <input type="radio" class="form-check-input" name="estado" value="R" id="estado" {{ ($_POST) ? ($utiles->valorPost('estado') == 'R' ? 'checked' : '') : (($tarea['estado'] ?? '') == 'R' ? 'checked' : '') }}>
            <label class="form-check-label" for="estado">R (Realizada)</label>
        </div>
        <div class="form-check">
            <input type="radio" class="form-check-input" name="estado" value="C" id="estado" {{ ($_POST) ? ($utiles->valorPost('estado') == 'C' ? 'checked' : '') : (($tarea['estado'] ?? '') == 'C' ? 'checked' : '') }}>
            <label class="form-check-label" for="estado">C (Cancelada)</label>
        </div>
    </div>

    <div class="form-group">
        <label for="fecha_creacion">Fecha de creación de la tarea</label>
        <input type="date" class="form-control" name="fecha_creacion" id="fecha_creacion" readonly value="{{ empty($tarea['fecha_creacion']) ? date('Y-m-d') : $tarea['fecha_creacion'] }}">
    </div>

    <div class="form-group">
        <label for="operario">Operario encargado</label>
        <span class="text-danger">{{ $errores->Error('operario') }}</span>
        <select class="form-control" name="operario" id="operario">
            <option value="" selected></option>
            @foreach($operarios as $operario)
                <option value="{{ $operario }}" {{ ($_POST) ? ($utiles->valorPost('operario') == $operario ? 'selected' : '') : (($tarea['operario'] ?? '') == $operario ? 'selected' : '') }}>{{ $operario }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="fecha_realizacion">Fecha de realización de la tarea*</label>
        <span class="text-danger">{{ $errores->Error('fecha_realizacion') }}</span>
        <input type="date" class="form-control" name="fecha_realizacion" id="fecha_realizacion" value="{{ ($_POST) ? $utiles->valorPost('fecha_realizacion') : ($tarea['fecha_realizacion'] ?? '') }}">
    </div>

    <div class="form-group">
        <label for="anotaciones_anteriores">Anotaciones anteriores</label>
        <textarea class="form-control" name="anotaciones_anteriores" id="anotaciones_anteriores">{{ ($_POST) ? $utiles->valorPost('anotaciones_anteriores') : ($tarea['anotaciones_anteriores'] ?? '') }}</textarea>
    </div>

    <div class="form-group">
        <label for="anotaciones_posteriores">Anotaciones posteriores</label>
        <textarea class="form-control" name="anotaciones_posteriores" id="anotaciones_posteriores">{{ ($_POST) ? $utiles->valorPost('anotaciones_posteriores') : ($tarea['anotaciones_posteriores'] ?? '') }}</textarea>
    </div>

    {{-- <div class="form-group">
        <label for="fichero">Fichero resumen de tareas realizadas</label>
        <input type="file" class="form-control-file" name="fichero_resumen" id="fichero">
    </div>

    <div class="form-group">
        <label for="foto">Fotos del trabajo realizado</label>
        <input type="file" class="form-control-file" name="foto" id="foto">
    </div> --}}

    <a href="{{ miurl('mostrar/tareas') }}" class="btn btn-outline-secondary">Cancelar</a>
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>
@endsection