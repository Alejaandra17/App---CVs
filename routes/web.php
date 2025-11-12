<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumnoController;

Route::get('/', function () {
    return redirect()->route('alumnos.index');
});

// Rutas  para los alumnos
Route::resource('alumnos', AlumnoController::class);
Route::get('alumnos/{alumno}/fotografia', [AlumnoController::class, 'fotografia'])->name('alumnos.fotografia');
