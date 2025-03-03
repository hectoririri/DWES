<div class="form-group">
    <label for="dni">DNI*</label>
    @error('dni')
        <br>
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <input type="text" class="form-control" name="dni" id="dni" value="{{ old('dni', $usuario->dni) }}">
</div>

<div class="form-group">
    <label for="name">Nombre*</label>
    @error('name')
        <br>
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <input type="text" class="form-control" name="name" id="name" value="{{ old('name', $usuario->name) }}">
</div>

<div class="form-group">
    <label for="password">Contraseña*</label>
    @error('password')
        <br>
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <input type="password" class="form-control" name="password" id="password" value="{{ old('password') }}">
</div>

<div class="form-group">
    <label for="email">Correo electrónico*</label>
    @error('email')
        <br>
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <input type="text" class="form-control" name="email" id="email" value="{{ old('email', $usuario->email) }}">
</div>

<div class="form-group">
    <label for="telefono">Telefono*</label>
    @error('telefono')
        <br>
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <input type="text" class="form-control" name="telefono" id="telefono" value="{{ old('telefono', $usuario->telefono) }}">
</div>

<div class="form-group">
    <label for="direccion">Direccion*</label>
    @error('direccion')
        <br>
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <input type="text" class="form-control" name="direccion" id="direccion" value="{{ old('direccion', $usuario->direccion) }}">
</div>

<div class="form-group">
    <label for="rol">Rol*</label>
    @error('rol')
        <br>
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="form-check">
        <input type="radio" class="form-check-input" name="rol" value="A" id="rol_A" @if(old('rol', $usuario->rol) == 'A') checked @endif>
        <label class="form-check-label" for="rol_A">Administrador</label>
    </div>
    <div class="form-check">
        <input type="radio" class="form-check-input" name="rol" value="O" id="rol_O" @if(old('rol', $usuario->rol) == 'O') checked @endif>
        <label class="form-check-label" for="rol_O">Operario</label>
    </div>
</div>