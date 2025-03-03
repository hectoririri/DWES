<div class="form-group">
    <label for="concepto">Concepto*</label>
    @error('concepto')
        <br>
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <input type="text" class="form-control" name="concepto" id="concepto" value="{{ old('concepto', $cuota->concepto) }}">
</div>

<div class="form-group">
    <label for="fecha_emision">Fecha Emisión*</label>
    @error('fecha_emision')
        <br>
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <input type="datetime-local" class="form-control" name="fecha_emision" id="fecha_emision" value="{{ old('fecha_emision', $cuota->fecha_emision) }}">
</div>

<div class="form-group">
    <label for="importe">Importe*</label>
    @error('importe')
        <br>
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <input type="text" placeholder="Importe permitido máximo dos decimales..." class="form-control" name="importe" id="importe" value="{{ old('importe', $cuota->importe) }}">
</div>

<div class="form-group">
    <label for="cliente">Cliente al que se aplica la cuota*</label>
    @error('cliente_id')
        <br>
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <select class="form-control" name="cliente_id" id="cliente">
        <option value="" hidden selected>Seleccione a un cliente</option>
        @foreach ($clientes as $cliente)
                    <option value="{{$cliente->id}}" {{ old('cliente_id', $cuota->cliente_id) == $cliente->id ? 'selected' : '' }} >{{$cliente->nombre." ".$cliente->apellidos}}</option>
        @endforeach
    </select>
</div>

<div class="form-group text-center">
    <p for="notas">Notas</p>
    @error('notas')
        <br>
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <textarea name="notas" id="notas" cols="50" rows="2">{{ old('notas', $cuota->notas) }}</textarea>
</div>