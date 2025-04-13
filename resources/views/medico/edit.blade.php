<!doctype html>
 <html lang="es">
   <head>
     <!-- Required meta tags -->
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
 
     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
 
     <title>Add medicos</title>
   </head>
   <body>
     <div class="container">
         <h1>Add medicos</h1>
    
         <form method="POST" action="{{ route('medicos.update', ['medico' => $medico->id]) }}">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="id" class="form-label">ID</label>
                <input type="text" class="form-control" id="id" aria-describedby="idHelp" name="id" disabled="disabled" value="{{ $medico->id }}">
                <div id="idHelp" class="form-text">ID del médico (código único).</div>
            </div>
    
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" required class="form-control" id="nombre" placeholder="Nombre del médico" name="nombre" value="{{ $medico->nombre }}">
            </div>
    
            <div class="mb-3">
                <label for="apellido" class="form-label">Apellido</label>
                <input type="text" required class="form-control" id="apellido" placeholder="Apellido del médico" name="apellido" value="{{ $medico->apellido }}">
            </div>
    
            <div class="mb-3">
                <label for="especialidad" class="form-label">Especialidad</label>
                <input type="text" required class="form-control" id="especialidad" placeholder="Especialidad del médico" name="especialidad" value="{{ $medico->especialidad }}">
            </div>
    
            <div class="mb-3">
                <label for="horarios" class="form-label">horarios</label>
                <input type="text" required class="form-control" id="horarios" aria-describedby="horariosHelp" name="horarios" placeholder="horarios del médico." value="{{ $medico->horarios }}">
            </div>

            <div class="mb-3">
                <label for="telefono" class="form-label">Teléfono</label>
                <input type="text" required class="form-control" id="telefono" placeholder="Teléfono del médico" name="telefono" value="{{ $medico->telefono }}">
            </div>
    
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" required class="form-control" id="email" placeholder="Email del médico" name="email" value="{{ $medico->email }}">
            </div>
    
            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Actualizar</button>
                <a href="{{ route('medicos.index') }}" class="btn btn-warning">Cancelar</a>
            </div>
        </form>
     
     <!-- Optional JavaScript; choose one of the two! -->
 
     <!-- Option 1: Bootstrap Bundle with Popper -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
 
     <!-- Option 2: Separate Popper and Bootstrap JS -->
     <!--
     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
     -->
   </body>
 </html>