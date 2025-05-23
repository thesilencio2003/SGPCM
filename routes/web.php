<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PacientsController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\CitasController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/pacientes', [PacientsController::class,'index'])->name('pacientes.index');
    Route::get('/pacientes/create', [PacientsController::class,'create'])->name('pacientes.create');
    Route::post('/pacientes', [PacientsController::class,'store'])->name('pacientes.store');
    Route::put('/pacientes/{id}', [PacientsController::class,'update'])->name('pacientes.update');
    Route::get('/pacientes/{id}/edit', [PacientsController::class,'edit'])->name('pacientes.edit');
    Route::delete('/pacientes/{id}', [PacientsController::class,'destroy'])-> name('pacientes.destroy');

    Route::get('/medicos', [MedicoController::class,'index'])->name('medicos.index');
    Route::post('/medicos', [MedicoController::class,'store'])->name('medicos.store');
    Route::get ('/medicos/create', [MedicoController::class,'create'])->name('medicos.create');
    Route::put('/medicos/{medico}', [MedicoController::class, 'update'])->name('medicos.update');
    Route::get( '/medicos/{medico}/edit', [MedicoController::class, 'edit'])->name('medicos.edit');
    Route::delete ('/medicos/{medico}', [MedicoController::class,'destroy'])->name('medicos.destroy');

    Route::get('/citas', [CitasController::class,'index'])->name('citas.index');
    Route::post('/citas', [CitasController::class,'store'])->name('citas.store');
    Route::get ('/citas/create', [CitasController::class,'create'])->name('citas.create');
    Route::put('/citas/{cita}', [CitasController::class, 'update'])->name('citas.update');
    Route::get( '/citas/{cita}/edit', [CitasController::class, 'edit'])->name('citas.edit');
    Route::delete('/citas/{cita}', [CitasController::class, 'destroy'])->name('citas.destroy');
});

require __DIR__.'/auth.php';
