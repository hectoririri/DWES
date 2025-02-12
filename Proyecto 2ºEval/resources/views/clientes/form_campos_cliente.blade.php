<div class="form-group">
    <label for="Cif">Cif del cliente*</label>
    @error('cif')
        <br>
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <input type="text" class="form-control" name="cif" id="Cif" value="{{ old('cif', $cliente->cif) }}">
</div>

<div class="form-group">
    <label for="Nombre">Nombre del cliente</label>
    @error('nombre')
        <br>
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <input type="text" class="form-control" name="nombre" id="Nombre" value="{{ old('nombre', $cliente->nombre) }}">
</div>

<div class="form-group">
    <label for="Telefono">Teléfono</label>
    @error('telefono')
        <br>
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <input type="text" class="form-control" name="telefono" id="Telefono" value="{{ old('telefono', $cliente->telefono) }}">
</div>

<div class="form-group">
    <label for="CorreoElectronico">Correo electrónico*</label>
    @error('correo')
        <br>
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <input type="text" class="form-control" name="correo" id="CorreoElectronico" value="{{ old('correo', $cliente->correo) }}">
</div>

<div class="form-group">
    <label for="Pais">Pais*</label>
    @error('pais')
        <br>
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <select class="form-control" name="pais" id="Pais">
        <option value="" selected></option>
       @foreach ($paises as $pais)
        <option value="{{$pais->id}}" {{ old('pais', $cliente->pais) == $pais->id ? 'selected' : '' }}>{{$pais->nombre}}</option>
       @endforeach
    </select>
</div>

<div class="form-group">
    <label for="CuentaCorriente">Cuenta Corriente</label>
    @error('cuenta_corriente')
        <br>
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <input type="text" class="form-control" name="cuenta_corriente" id="CuentaCorriente" value="{{ old('cuenta_corriente', $cliente->cuenta_corriente) }}">
</div>

<div class="form-group">
    <label for="Moneda">Moneda</label>
    @error('moneda')
        <br>
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <select class="form-control" name="moneda" id="Pais">
        <option value="" selected></option>
       @foreach ($paises as $pais)
       @if ($pais->iso_moneda != null)
        <option value="{{$pais->iso_moneda}}" {{ old('moneda', $cliente->moneda) == $pais->iso_moneda ? 'selected' : '' }}>{{$pais->iso_moneda}}</option>
       @endif
       @endforeach
    </select>
</div>

<div class="form-group">
    <label for="ImporteMensual">Importe Mensual</label>
    @error('importe_mensual')
        <br>
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    
    <input type="text" class="form-control" name="importe_mensual" id="ImporteMensual" value="{{ old('importe_mensual', $cliente->importe_mensual) }}">
</div>