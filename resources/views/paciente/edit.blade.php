<div class="container">
    <h1>Editar Paciente</h1>
    <form action="{{ route('pacientes.update', $paciente->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', $paciente->nombre) }}" required>
        </div>
        
        <div class="form-group">
            <label for="apellido">Apellido</label>
            <input type="text" class="form-control" id="apellido" name="apellido" value="{{ old('apellido', $paciente->apellido) }}" required>
        </div>
        
        <div class="form-group">
            <label for="fecha_nacimiento">Fecha de Nacimiento</label>
            <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" value="{{ old('fecha_nacimiento', $paciente->fecha_nacimiento) }}" required>
        </div>
        
        <div class="form-group">
            <label for="genero">Género</label>
            <select class="form-control" id="genero" name="genero" required>
                <option value="Masculino" {{ $paciente->genero == 'Masculino' ? 'selected' : '' }}>Masculino</option>
                <option value="Femenino" {{ $paciente->genero == 'Femenino' ? 'selected' : '' }}>Femenino</option>
                <option value="Otro" {{ $paciente->genero == 'Otro' ? 'selected' : '' }}>Otro</option>
            </select>
        </div>
        
        <div class="form-group">
            <label for="direccion">Dirección</label>
            <input type="text" class="form-control" id="direccion" name="direccion" value="{{ old('direccion', $paciente->direccion) }}" required>
        </div>
        
        <div class="form-group">
            <label for="telefono">Teléfono</label>
            <input type="text" class="form-control" id="telefono" name="telefono" value="{{ old('telefono', $paciente->telefono) }}" required>
        </div>
        
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $paciente->email) }}" required>
        </div>
        
        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="{{ route('pacientes.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>