<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Citas;
use Illuminate\Support\Facades\DB;

class CitasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $citas = DB::table('citas')
        ->join('pacientes', 'citas.paciente_id', '=', 'pacientes.id')
        ->join('medicos', 'citas.medico_id', '=', 'medicos.id')
        ->select(
            'citas.*',
            'pacientes.nombre as nombre_paciente',
            'medicos.nombre as nombre_medico'
        )
        ->get(); 
    return view('cita.index', ['citas' => $citas]);

   
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pacientes = DB::table('pacientes')
        ->orderBy('nombre')
        ->get();

        $medicos = DB::table('medicos')
            ->orderBy('nombre')
            ->get();

        return view('cita.new', ['pacientes' => $pacientes, 'medicos' => $medicos]);
  
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'paciente_id' => 'required|exists:pacientes,id',
            'medico_id' => 'required|exists:medicos,id',
            'fecha_cita' => 'required|date',
            'hora_cita' => 'required|date_format:H:i',
            'motivo_consulta' => 'required|string|max:255',
        ]);

        $cita = new Citas();
        $cita->paciente_id = $request->paciente_id;
        $cita->medico_id = $request->medico_id;
        $cita->fecha_cita = $request->fecha_cita;
        $cita->hora_cita = $request->hora_cita;
        $cita->motivo_consulta = $request->motivo_consulta;
        $cita->save(); 
        $citas = DB::table('citas')
            ->join('pacientes', 'citas.paciente_id', '=', 'pacientes.id')
            ->join('medicos', 'citas.medico_id', '=', 'medicos.id')
            ->select('citas.*', 'pacientes.nombre as nombre_paciente', 'medicos.nombre as nombre_medico')
            ->get();

        return view('cita.index', ['citas' => $citas]);
  
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
