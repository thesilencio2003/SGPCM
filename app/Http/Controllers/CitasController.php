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

  
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
  
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
