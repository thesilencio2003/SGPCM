<div class="container">
    <h1>Editar Cita</h1>

    <form method="POST" action="{{ route('citas.update', ['cita' => $cita->id]) }}">
        @method('put')
        @csrf

        <div class="mb-3">
            <label for="id" class="form-label">ID</label>
            <input type="text" class="form-control" id="id" aria-describedby="idHelp" name="id" disabled value="{{ $cita->id }}">
            <div id="idHelp" class="form-text">ID de la cita.</div>
        </div>

        <div class="mb-3">
            <label for="paciente_id" class="form-label">Paciente</label>
            <select class="form-select" id="paciente_id" name="paciente_id" required>
                <option selected disabled value="">Seleccionar Paciente...</option>
                @foreach ($pacientes as $paciente)
                    <option value="{{ $paciente->id }}" {{ $paciente->id == $cita->paciente_id ? 'selected' : '' }}>
                        {{ $paciente->nombre }} {{ $paciente->apellido }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="medico_id" class="form-label">Médico</label>
            <select class="form-select" id="medico_id" name="medico_id" required>
                <option selected disabled value="">Seleccionar Médico...</option>
                @foreach ($medicos as $medico)
                    <option value="{{ $medico->id }}" {{ $medico->id == $cita->medico_id ? 'selected' : '' }}>
                        {{ $medico->nombre }} {{ $medico->apellido }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="fecha_cita" class="form-label">Fecha de la Cita</label>
            <input type="date" class="form-control" id="fecha_cita" name="fecha_cita" value="{{ $cita->fecha_cita }}" required>
        </div>

        <div class="mb-3">
            <label for="hora_cita" class="form-label">Hora de la Cita</label>
            <input type="time" class="form-control" id="hora_cita" name="hora_cita" value="{{ $cita->hora_cita }}" required>
        </div>

        <div class="mb-3">
            <label for="motivo_consulta" class="form-label">Motivo de la Consulta</label>
            <textarea class="form-control" id="motivo_consulta" name="motivo_consulta" placeholder="Ingrese el motivo de la consulta" required>{{ $cita->motivo_consulta }}</textarea>
        </div>

        <div class="mt-3">
            <button type="submit" class="btn btn-primary">Actualizar Cita</button>
            <a href="{{ route('citas.index') }}" class="btn btn-warning">Cancelar</a>
        </div>
    </form>
</div>