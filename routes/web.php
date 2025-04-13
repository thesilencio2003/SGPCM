<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PacientsController;

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

});

require __DIR__.'/auth.php';
