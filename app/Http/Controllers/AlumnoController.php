<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AlumnoController extends Controller
{
    // Mostrar listado de alumnos
    public function index()
    {
        $alumnos = Alumno::paginate(9);
        return view('alumnos.index', compact('alumnos'));
    }

    // Mostrar formulario de creación
    public function create()
    {
        return view('alumnos.create');
    }

    // Guardar alumno nuevo
    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'telefono' => 'nullable|string|max:20',
            'correo' => 'required|email|max:255',
            'fecha_nacimiento' => 'nullable|date',
            'nota_media' => 'nullable|numeric|min:0|max:10',
            'fotografia' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('fotografia')) {
            $data['fotografia'] = $request->file('fotografia')->store('alumnos', 'private');
        }

        Alumno::create($data);

        return redirect()->route('alumnos.index')->with('success', 'Alumno creado correctamente.');
    }

    // Mostrar perfil de alumno
    public function show(Alumno $alumno)
    {
        return view('alumnos.show', compact('alumno'));
    }

    // Formulario para editar alumno
    public function edit(Alumno $alumno)
    {
        return view('alumnos.edit', compact('alumno'));
    }

    // Actualizar alumno
    public function update(Request $request, Alumno $alumno)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'telefono' => 'nullable|string|max:20',
            'correo' => 'required|email|max:255',
            'fecha_nacimiento' => 'nullable|date',
            'nota_media' => 'nullable|numeric|min:0|max:10',
            'fotografia' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('fotografia')) {
            // Borrar imagen antigua si existe
            if ($alumno->fotografia && Storage::disk('private')->exists($alumno->fotografia)) {
                Storage::disk('private')->delete($alumno->fotografia);
            }

            $data['fotografia'] = $request->file('fotografia')->store('alumnos', 'private');
        }

        $alumno->update($data);

        return redirect()->route('alumnos.index')->with('success', 'Alumno actualizado correctamente.');
    }

    // Eliminar alumno
    public function destroy(Alumno $alumno)
    {
        if ($alumno->fotografia && Storage::disk('private')->exists($alumno->fotografia)) {
            Storage::disk('private')->delete($alumno->fotografia);
        }

        $alumno->delete();

        return redirect()->route('alumnos.index')->with('success', 'Alumno eliminado correctamente.');
    }

    // Servir fotografía privada
    public function fotografia(Alumno $alumno)
    {
        if (!$alumno->fotografia || !Storage::disk('private')->exists($alumno->fotografia)) {
            abort(404);
        }

        return response()->file(Storage::disk('private')->path($alumno->fotografia));
    }
}
