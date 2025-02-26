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
    <input type="text" class="form-control" name="importe" id="importe" value="{{ old('importe', $cuota->importe) }}">
</div>

<div class="form-group">
    <label for="fecha_pago">Fecha Pago*</label>
    @error('fecha_pago')
        <br>
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <input type="datetime-local" class="form-control" name="fecha_pago" id="fecha_pago" value="{{ old('fecha_pago', $cuota->fecha_pago) }}">
</div>

<div class="form-group">
    <label for="notas">Notas</label>
    @error('notas')
        <br>
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <textarea name="notas" id="notas" cols="30" rows="10">{{ old('notas', $cuota->notas) }}</textarea>
</div>