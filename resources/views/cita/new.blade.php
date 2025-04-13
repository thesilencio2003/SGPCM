<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Crear Cita</title>
</head>
<body>
    <div class="container">
        <h1>Crear Cita</h1>

        <form method="POST" action="{{ route('citas.store') }}">
            @csrf
            <div class="mb-3">
                <label for="id" class="form-label">ID</label>
                <input type="text" class="form-control" id="id" aria-describedby="idHelp" name="id" disabled>
                <div id="idHelp" class="form-text">ID de la cita (se genera automáticamente)</div>
            </div>
            <div class="mb-3">
                <label for="paciente_id" class="form-label">Paciente</label>
                <select class="form-select" id="paciente_id" name="paciente_id" required>
                    <option selected disabled value="">Seleccionar Paciente...</option>
                    @foreach ($pacientes as $paciente)
                        <option value="{{ $paciente->id }}">{{ $paciente->nombre }} {{ $paciente->apellido }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="medico_id" class="form-label">Médico</label>
                <select class="form-select" id="medico_id" name="medico_id" required>
                    <option selected disabled value="">Seleccionar Médico...</option>
                    @foreach ($medicos as $medico)
                        <option value="{{ $medico->id }}">{{ $medico->nombre }} {{ $medico->apellido }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="fecha_cita" class="form-label">Fecha de la Cita</label>
                <input type="date" class="form-control" id="fecha_cita" name="fecha_cita" required>
            </div>
            <div class="mb-3">
                <label for="hora_cita" class="form-label">Hora de la Cita</label>
                <input type="time" class="form-control" id="hora_cita" name="hora_cita" required>
            </div>
            <div class="mb-3">
                <label for="motivo_consulta" class="form-label">Motivo de la Consulta</label>
                <textarea class="form-control" id="motivo_consulta" name="motivo_consulta" placeholder="Ingrese el motivo de la consulta" required></textarea>
            </div>

            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Guardar Cita</button>
                <a href="{{ route('citas.index') }}" class="btn btn-warning">Cancelar</a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    </body>
</html>