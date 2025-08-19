<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materia;
use App\Models\Docente;

class MateriaController extends Controller
{
    public function index() {
        $materias = Materia::with('docente')->get();
        return view('materias.index', compact('materias'));
    }

    public function create() {
        $docentes = Docente::all();
        return view('materias.create', compact('docentes'));
    }

    public function store(Request $request) {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'docente_id' => 'required|exists:docentes,id'
        ]);
        Materia::create($request->all());
        return redirect()->route('materias.index')->with('success', 'Materia creada correctamente');
    }

    public function edit(Materia $materia) {
        $docentes = Docente::all();
        return view('materias.edit', compact('materia', 'docentes'));
    }

    public function update(Request $request, Materia $materia) {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'docente_id' => 'required|exists:docentes,id'
        ]);
        $materia->update($request->all());
        return redirect()->route('materias.index')->with('success', 'Materia actualizada correctamente');
    }

    public function destroy(Materia $materia) {
        $materia->delete();
        return redirect()->route('materias.index')->with('success', 'Materia eliminada correctamente');
    }
}
