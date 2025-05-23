<!doctype html>
  <html lang="es">
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
  
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
 </head>
   <body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('paciente') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <a href="{{ route('pacientes.create') }}" class="btn btn-success mb-4">{{ __('Crer nuevo paciente') }}</a>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Code</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Apellido</th>
                                    <th scope="col">fecha_nacimiento</th>
                                    <th scope="col">genero</th>
                                    <th scope="col">direccion</th>
                                    <th scope="col">telefono</th>
                                    <th scope="col">email</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pacientes as $paciente)
                                <tr>
                                    <th scope="row">{{ $paciente->id }}</th>
                                    <td>{{ $paciente->nombre }}</td>
                                    <td>{{ $paciente->apellido }}</td>
                                    <td>{{ $paciente->fecha_nacimiento }}</td>
                                    <td>{{ $paciente->genero }}</td>
                                    <td>{{ $paciente->direccion }}</td>
                                    <td>{{ $paciente->telefono }}</td>
                                    <td>{{ $paciente->email }}</td>
                                    <td> 
                                        <a href="{{ route('pacientes.edit', $paciente->id) }}" class="btn btn-primary btn-sm">{{ __('Edit') }}</a>
                                        <form action="{{ route('pacientes.destroy', $paciente->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>


  </html>