@extends('layout/plantilla')
@section('title', 'Formulario')
@section('cuerpo')
<form method="post" enctype="multipart/form-data" class="bg-light p-4 rounded">
    <h2 class="text-secondary">{{$titulo}} tarea</h2>

    <div class="form-group">
        <label for="nif/cif">NIF o CIF*</label>
        <input type="text" class="form-control" name="nif_cif" id="nif/cif">
    </div>

    <div class="form-group">
        <label for="nombre">Nombre*</label>
        <input type="text" class="form-control" name="nombre" id="nombre">
    </div>

    <div class="form-group">
        <label for="apellidos">Apellidos*</label>
        <input type="text" class="form-control" name="apellidos" id="apellidos">
    </div>

    <div class="form-group">
        <label for="telefono_contacto">Teléfono de contacto*</label>
        <input type="text" class="form-control" name="telefono" id="telefono_contacto">
    </div>

    <div class="form-group">
        <label for="descripcion">Descripción identificativa de la tarea*</label>
        <textarea class="form-control" name="descripcion" id="descripcion"></textarea>
    </div>

    <div class="form-group">
        <label for="correo">Correo electrónico*</label>
        <input type="text" class="form-control" name="correo" id="correo">
    </div>

    <div class="form-group">
        <label for="direccion">Dirección donde hay que ir a realizar la tarea</label>
        <input type="text" class="form-control" name="direccion" id="direccion">
    </div>

    <div class="form-group">
        <label for="poblacion">Población</label>
        <input type="text" class="form-control" name="poblacion" id="poblacion">
    </div>

    <div class="form-group">
        <label for="cod_postal">Código Postal*</label>
        <input type="text" class="form-control" name="cod_postal" placeholder="21006..." id="cod_postal">
    </div>

    <div class="form-group">
        <label for="provincia">Provincia*</label>
        <select class="form-control" name="provincia" id="provincia">
            <option value="" selected></option>
           
        </select>
    </div>

    <div class="form-group">
        <label for="estado">Estado de la tarea</label>
        <div class="form-check">
            <input type="radio" class="form-check-input" name="estado" value="P" id="estado">
            <label class="form-check-label" for="estado">P (Pendiente)</label>
        </div>
        <div class="form-check">
            <input type="radio" class="form-check-input" name="estado" value="B" id="estado">
            <label class="form-check-label" for="estado">B (Esperando ser aprobada)</label>
        </div>
        <div class="form-check">
            <input type="radio" class="form-check-input" name="estado" value="R" id="estado">
            <label class="form-check-label" for="estado">R (Realizada)</label>
        </div>
        <div class="form-check">
            <input type="radio" class="form-check-input" name="estado" value="C" id="estado">
            <label class="form-check-label" for="estado">C (Cancelada)</label>
        </div>
    </div>

    <div class="form-group">
        <label for="fecha_creacion">Fecha de creación de la tarea</label>
        <input type="date" class="form-control" name="fecha_creacion" id="fecha_creacion" readonly>
    </div>

    <div class="form-group">
        <label for="operario">Operario encargado</label>
        <select class="form-control" name="operario" id="operario">
            <option value="" selected></option>
            
        </select>
    </div>

    <div class="form-group">
        <label for="fecha_realizacion">Fecha de realización de la tarea*</label>
        <input type="date" class="form-control" name="fecha_realizacion" id="fecha_realizacion">
    </div>

    <div class="form-group">
        <label for="anotaciones_anteriores">Anotaciones anteriores</label>
        <textarea class="form-control" name="anotaciones_anteriores" id="anotaciones_anteriores"></textarea>
    </div>

    <div class="form-group">
        <label for="anotaciones_posteriores">Anotaciones posteriores</label>
        <textarea class="form-control" name="anotaciones_posteriores" id="anotaciones_posteriores"></textarea>
    </div>

    <div class="form-group">
        <label for="fichero">Fichero resumen de tareas realizadas</label>
        <input type="file" class="form-control-file" name="fichero_resumen" id="fichero">
    </div>

    <div class="form-group">
        <label for="foto">Fotos del trabajo realizado</label>
        <input type="file" class="form-control-file" name="foto" id="foto">
    </div>

    <a href="{{ miurl('mostrar/tareas') }}" class="btn btn-outline-secondary">Cancelar</a>
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>
@endsection