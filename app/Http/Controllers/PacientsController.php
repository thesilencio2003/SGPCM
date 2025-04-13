<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pacientes;
use Illuminate\Support\Facades\DB;

class PacientsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pacientes = DB::table('pacientes')->get();
        return view('paciente.index', ['pacientes' => $pacientes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('paciente.new');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::table('pacientes')->insert([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'genero' => $request->genero,
            'direccion' => $request->direccion,
            'telefono' => $request->telefono,
            'email' => $request->email,
        ]);

        $pacientes = DB::table('pacientes')->get();
        return view('paciente.index', ['pacientes' => $pacientes]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $paciente = DB::table('pacientes')
        ->leftJoin('citas', 'pacientes.id', '=', 'citas.paciente_id')
        ->select('pacientes.*', 'citas.fecha_cita as cita_fecha') 
        ->where('pacientes.id', $id)
        ->first();

        return view('paciente.edit', ['paciente' => $paciente]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        DB::table('pacientes')
        ->where('id', $id)
        ->update([
        'nombre' => $request->nombre,
        'apellido' => $request->apellido,
        'fecha_nacimiento' => $request->fecha_nacimiento,
        'genero' => $request->genero,
        'direccion' => $request->direccion,
        'telefono' => $request->telefono,
        'email' => $request->email,
    ]);

        $pacientes = DB::table('pacientes')->get();
        return view('paciente.index', ['pacientes' => $pacientes]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('citas')->join('pacientes', 'citas.paciente_id', '=', 'pacientes.id')
            ->where('pacientes.id', $id)
            ->delete();

        DB::table('pacientes')->join('citas', 'pacientes.id', '=', 'citas.paciente_id')
            ->where('pacientes.id', $id)
            ->delete();

        $pacientes = DB::table('pacientes')->get();
        return view('pacientes.index', ['pacientes' => $pacientes]);
    }
}
