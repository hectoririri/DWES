<div class="form-group">
    <label for="nif_cif">NIF o CIF*</label>
    @error('nif_cif')
        <br>
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <input type="text" class="form-control" name="nif_cif" id="nif_cif" value="{{ old('nif_cif', $tarea->nif_cif) }}">
</div>

<div class="form-group">
    <label for="nombre">Nombre*</label>
    @error('nombre')
        <br>
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <input type="text" class="form-control" name="nombre" id="nombre" value="{{ old('nombre') }}">
</div>

<div class="form-group">
    <label for="apellidos">Apellidos*</label>
    @error('apellidos')
        <br>
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <input type="text" class="form-control" name="apellidos" id="apellidos" value="{{ old('apellidos') }}">
</div>

<div class="form-group">
    <label for="telefono_contacto">Teléfono de contacto*</label>
    @error('telefono')
        <br>
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <input type="text" class="form-control" name="telefono" id="telefono_contacto" value="{{ old('telefono') }}">
</div>

<div class="form-group">
    <label for="descripcion">Descripción identificativa de la tarea*</label>
    @error('descripcion')
        <br>
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <textarea class="form-control" name="descripcion" id="descripcion">{{ old('descripcion') }}</textarea>
</div>

<div class="form-group">
    <label for="correo">Correo electrónico*</label>
    @error('correo')
        <br>
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <input type="text" class="form-control" name="correo" id="correo" value="{{ old('correo') }}">
</div>

<div class="form-group">
    <label for="direccion">Dirección donde hay que ir a realizar la tarea</label>
    @error('direccion')
        <br>
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <input type="text" class="form-control" name="direccion" id="direccion" value="{{ old('direccion') }}">
</div>

<div class="form-group">
    <label for="poblacion">Población</label>
    @error('poblacion')
        <br>
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <input type="text" class="form-control" name="poblacion" id="poblacion" value="{{ old('poblacion') }}">
</div>

<div class="form-group">
    <label for="cod_postal">Código Postal*</label>
    @error('cod_postal')
        <br>
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <input type="text" class="form-control" name="cod_postal" id="cod_postal" value="{{ old('cod_postal') }}">
</div>

<div class="form-group">
    <label for="provincia">Provincia*</label>
    @error('provincia')
        <br>
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <select class="form-control" name="provincia" id="provincia">
        <option value="" selected></option>
       @foreach ($provincias as $provincia)
        <option value="{{$provincia->nombre}}" @if(old('provincia') == $provincia->nombre) selected @endif>{{$provincia->nombre}}</option>
       @endforeach
    </select>
</div>

<div class="form-group">
    <label for="estado">Estado de la tarea</label>
    @error('estado')
        <br>
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="form-check">
        <input type="radio" class="form-check-input" name="estado" value="P" id="estado_P" @if(old('estado') == 'P') checked @endif>
        <label class="form-check-label" for="estado_P">P (Pendiente)</label>
    </div>
    <div class="form-check">
        <input type="radio" class="form-check-input" name="estado" value="B" id="estado_B" @if(old('estado') == 'B') checked @endif>
        <label class="form-check-label" for="estado_B">B (Esperando ser aprobada)</label>
    </div>
    <div class="form-check">
        <input type="radio" class="form-check-input" name="estado" value="R" id="estado_R" @if(old('estado') == 'R') checked @endif>
        <label class="form-check-label" for="estado_R">R (Realizada)</label>
    </div>
    <div class="form-check">
        <input type="radio" class="form-check-input" name="estado" value="C" id="estado_C" @if(old('estado') == 'C') checked @endif>
        <label class="form-check-label" for="estado_C">C (Cancelada)</label>
    </div>
</div>

<div class="form-group">
    <label for="fecha_creacion">Fecha de creación de la tarea</label>
    @error('fecha_creacion')
        <br>
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <input type="date" class="form-control" name="fecha_creacion" id="fecha_creacion" value="{{ date('Y-m-d') }}" readonly>
</div>

{{-- Si es cliente se oculta --}}
<div class="form-group">
    <label for="operario">Operario encargado*</label>
    @error('operario')
        <br>
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <select class="form-control" name="operario" id="operario_id">
        <option value="" selected></option>
        @foreach ($operarios as $operario)
            <option value="{{$operario->id}}" @if(old('operario') == $operario->id) selected @endif >{{$operario->nombre." ".$operario->apellidos}}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="fecha_realizacion">Fecha de realización de la tarea*</label>
    @error('fecha_realizacion')
        <br>
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <input type="date" class="form-control" name="fecha_realizacion" id="fecha_realizacion" value=" {{ old('fecha_realizacion') }}">
</div>

<div class="form-group">
    <label for="anotaciones_anteriores">Anotaciones anteriores</label>
    @error('anotaciones_anteriores')
        <br>
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <textarea class="form-control" name="anotaciones_anteriores" id="anotaciones_anteriores">{{ old('anotaciones_anteriores') }}</textarea>
</div>

<div class="form-group">
    <label for="anotaciones_posteriores">Anotaciones posteriores</label>
    @error('anotaciones_posteriores')
        <br>
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
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