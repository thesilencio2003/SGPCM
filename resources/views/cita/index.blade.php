<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Listado de citas</title>
</head>
<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Citas') }}
            </h2>
        </x-slot>
        <div class="container">
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">
                            <a href="{{ route('citas.create') }}" class="btn btn-success">Agendar cita </a>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Nombre del Paciente</th>
                                        <th scope="col">Nombre del Médico</th>
                                        <th scope="col">Fecha de la Cita</th>
                                        <th scope="col">Hora de la Cita</th>
                                        <th scope="col">Motivo de la Consulta</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($citas as $cita)
                                        <tr>
                                            <td>{{ $cita->id }}</td>
                                            <td>{{ $cita->nombre_paciente }}</td>
                                            <td>{{ $cita->nombre_medico }}</td>
                                            <td>{{ $cita->fecha_cita }}</td>
                                            <td>{{ $cita->hora_cita }}</td>
                                            <td>{{ $cita->motivo_consulta }}</td>
                                            <td>
                                                
                                                <a href="{{route('citas.edit',['cita'=>$cita->id])}}" class="btn btn-info">Edit</a>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>