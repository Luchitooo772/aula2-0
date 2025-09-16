<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materia;
use App\Models\Docente;
use App\Models\Aula; // Importamos el modelo de Aula

class MateriaController extends Controller
{
    public function index() {
        $materias = Materia::with(['docente', 'aulas'])->get(); // Cargamos la relación con aulas
        return view('materias.index', compact('materias'));
    }

    public function create() {
        $docentes = Docente::all();
        $aulas = Aula::all(); // Obtenemos todas las aulas
        return view('materias.create', compact('docentes', 'aulas'));
    }

    public function store(Request $request) {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'docente_id' => 'required|exists:docentes,id',
            'horario' => 'nullable|string',
            'dias' => 'nullable|string',
            'aulas' => 'nullable|array', // Validamos que aulas sea un arreglo
            'aulas.*' => 'exists:aulas,id', // Validamos que cada ID de aula exista
        ]);

        $materia = Materia::create($request->all());
        $materia->aulas()->sync($request->aulas); // Sincronizamos las aulas
        
        return redirect()->route('materias.index')->with('success', 'Materia creada correctamente');
    }

    public function edit(Materia $materia) {
        $docentes = Docente::all();
        $aulas = Aula::all();
        return view('materias.edit', compact('materia', 'docentes', 'aulas'));
    }

    public function update(Request $request, Materia $materia) {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'docente_id' => 'required|exists:docentes,id',
            'horario' => 'nullable|string',
            'dias' => 'nullable|string',
            'aulas' => 'nullable|array',
            'aulas.*' => 'exists:aulas,id',
        ]);

        $materia->update($request->all());
        $materia->aulas()->sync($request->aulas); // Sincronizamos las aulas
        
        return redirect()->route('materias.index')->with('success', 'Materia actualizada correctamente');
    }

    public function destroy(Materia $materia) {
        $materia->delete();
        return redirect()->route('materias.index')->with('success', 'Materia eliminada correctamente');
    }
}