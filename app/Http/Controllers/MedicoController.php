<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\medicos;
use Illuminate\Support\Facades\DB;

class MedicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $medicos = DB::table('medicos')
        ->get();
        return view('medico.index', ['medicos' => $medicos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $medicos = DB::table('medicos')
        ->orderBy('id')
        ->get();
        return view('medico.new', ['medicos'=>$medicos]);
 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $medico = new medicos();
        $medico->nombre = $request->nombre;
        $medico->apellido = $request->apellido;
        $medico->especialidad = $request->especialidad;
        $medico->horarios = $request->horarios;
        $medico->telefono = $request->telefono;
        $medico->email = $request->email;
        $medico->save();

        $medicos = DB::table('medicos')
        ->get();
         return view('medico.index', ['medicos'=>$medicos]);
  
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
        $medico = medicos::find($id);
        return view('medico.edit', ['medico' => $medico]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $medico = medicos::find($id);

        $medico->nombre = $request->nombre;
        $medico->apellido = $request->apellido;
        $medico->especialidad = $request->especialidad;
        $medico->horarios = $request->horarios;
        $medico->telefono = $request->telefono;
        $medico->email = $request->email;
        $medico->save();
       

        $medicos = DB::table('medicos')
            ->get();    

        return view('medico.index', ['medicos' => $medicos]);
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $medico = medicos::find($id);
        $medico->delete();
        $medicos = DB::table('medicos')
        ->get();
        return view('medico.index', ['medicos' => $medicos]);
    }
}
