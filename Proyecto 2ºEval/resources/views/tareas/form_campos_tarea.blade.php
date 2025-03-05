

<div class="form-group">
    <label for="telefono_contacto">Teléfono de contacto*</label>
    @error('telefono_contacto')
        <br>
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <input type="text" placeholder="+34-XXX-XX-XX-XX" class="form-control" name="telefono_contacto" id="telefono_contacto" value="{{ old('telefono_contacto', $tarea->telefono_contacto) }}">
</div>

<div class="form-group">
    <label for="persona_contacto">Persona de contacto*</label>
    @error('persona_contacto')
        <br>
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <input type="text" class="form-control" name="persona_contacto" id="persona_contacto" value="{{ old('persona_contacto', $tarea->persona_contacto) }}">
</div>

<div class="form-group">
    <label for="correo_contacto">Correo de contacto*</label>
    @error('correo_contacto')
        <br>
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <input type="text" class="form-control" name="correo_contacto" id="correo_contacto" value="{{ old('correo_contacto', $tarea->correo_contacto) }}">
</div>

<div class="form-group">
    <label for="descripcion">Descripción identificativa de la tarea*</label>
    @error('descripcion')
        <br>
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <textarea class="form-control" name="descripcion" id="descripcion">{{ old('descripcion', $tarea->descripcion) }}</textarea>
</div>

<div class="form-group">
    <label for="direccion">Dirección donde hay que ir a realizar la tarea</label>
    @error('direccion')
        <br>
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <input type="text" class="form-control" name="direccion" id="direccion" value="{{ old('direccion', $tarea->direccion) }}">
</div>

<div class="form-group">
    <label for="poblacion">Población</label>
    @error('poblacion')
        <br>
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <input type="text" class="form-control" name="poblacion" id="poblacion" value="{{ old('poblacion', $tarea->poblacion) }}">
</div>

<div class="form-group">
    <label for="cod_postal">Código Postal*</label>
    @error('cod_postal')
        <br>
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <input type="text" class="form-control" name="cod_postal" id="cod_postal" value="{{ old('cod_postal', $tarea->cod_postal) }}">
</div>

<div class="form-group">
    <label for="provincia">Provincia*</label>
    @error('provincia')
        <br>
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <select class="form-control" name="provincia" id="provincia">
        <option value="" hidden selected>Seleccione una provincia</option>
       @foreach ($provincias as $provincia)
        <option value="{{$provincia->cod}}" {{ old('provincia', $tarea->provincia) == $provincia->cod ? 'selected' : '' }}>{{$provincia->nombre}}</option>
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
        <input type="radio" class="form-check-input" name="estado" value="P" id="estado_P" @if(old('estado', $tarea->estado) == 'P') checked @endif>
        <label class="form-check-label" for="estado_P">P (Pendiente)</label>
    </div>
    <div class="form-check">
        <input type="radio" class="form-check-input" name="estado" value="B" id="estado_B" @if(old('estado', $tarea->estado) == 'B') checked @endif>
        <label class="form-check-label" for="estado_B">B (Esperando ser aprobada)</label>
    </div>
    <div class="form-check">
        <input type="radio" class="form-check-input" name="estado" value="R" id="estado_R" @if(old('estado', $tarea->estado) == 'R') checked @endif>
        <label class="form-check-label" for="estado_R">R (Realizada)</label>
    </div>
    <div class="form-check">
        <input type="radio" class="form-check-input" name="estado" value="C" id="estado_C" @if(old('estado', $tarea->estado) == 'C') checked @endif>
        <label class="form-check-label" for="estado_C">C (Cancelada)</label>
    </div>
</div>

<div class="form-group">
    <label for="fecha_creacion">Fecha de creación de la tarea</label>
    @error('fecha_creacion')
        <br>
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    
    <input type="datetime-local" class="form-control" name="fecha_creacion" id="fecha_creacion" @if(!empty($tarea->fecha_creacion)) value="{{$tarea->fecha_creacion}}" @else value="{{ date("Y-m-d\\TH:i") }}" @endif readonly>
</div>

@if(auth()->check())
{{-- Para el cliente se oculta --}}
<div class="form-group">
    <label for="operario">Operario encargado*</label>
    @error('operario_id')
        <br>
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <select class="form-control" name="operario_id" id="operario">
        <option value="" hidden selected>Seleccione a un operario</option>
        @foreach ($operarios as $operario)
                    <option value="{{$operario->id}}" {{ old('operario_id', $tarea->operario_id) == $operario->id ? 'selected' : '' }} >{{$operario->name." ".$operario->apellidos}}</option>
        @endforeach
    </select>
</div>

{{-- Para el cliente se oculta --}}
<div class="form-group">
    <label for="cliente">Cliente que encarga el trabajo*</label>
    @error('cliente_id')
        <br>
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <select class="form-control" name="cliente_id" id="cliente">
        <option value="" hidden selected>Seleccione a un cliente</option>
        @foreach ($clientes as $cliente)
                    <option value="{{$cliente->id}}" {{ old('cliente_id', $tarea->cliente_id) == $cliente->id ? 'selected' : '' }} >{{$cliente->nombre." ".$cliente->apellidos}}</option>
        @endforeach
    </select>
</div>
@endif

<div class="form-group">
    <label for="fecha_realizacion">Fecha de realización de la tarea*</label>
    @error('fecha_realizacion')
        <br>
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <input type="datetime-local" class="form-control" name="fecha_realizacion" id="fecha_realizacion" value="{{ old('fecha_realizacion', $tarea->fecha_realizacion) }}">
</div>

<div class="form-group">
    <label for="anotaciones_anteriores">Anotaciones anteriores</label>
    @error('anotaciones_anteriores')
        <br>
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <textarea class="form-control" name="anotaciones_anteriores" id="anotaciones_anteriores">{{ old('anotaciones_anteriores', $tarea->anotaciones_anteriores) }}</textarea>
</div>

<div class="form-group">
    <label for="anotaciones_posteriores">Anotaciones posteriores</label>
    @error('anotaciones_posteriores')
        <br>
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <textarea class="form-control" name="anotaciones_posteriores" id="anotaciones_posteriores">{{ old('anotaciones_posteriores', $tarea->anotaciones_posteriores) }}</textarea>
</div>