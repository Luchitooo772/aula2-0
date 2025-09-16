<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cortina;
use App\Models\Aula;

class CortinaController extends Controller
{
    public function index() {
        $cortinas = Cortina::with('aula')->get();
        return view('cortinas.index', compact('cortinas'));
    }

    public function create() {
        $aulas = Aula::all();
        return view('cortinas.create', compact('aulas'));
    }

    public function store(Request $request) {
        $request->validate([
            'aula_id' => 'required|exists:aulas,id',
            'estado' => 'required|boolean'
        ]);
        Cortina::create($request->all());
        return redirect()->route('cortinas.index')->with('success', 'Cortina creada correctamente');
    }

    public function edit(Cortina $cortina) {
        $aulas = Aula::all();
        return view('cortinas.edit', compact('cortina', 'aulas'));
    }

    public function update(Request $request, Cortina $cortina) {
        $request->validate([
            'aula_id' => 'required|exists:aulas,id',
            'estado' => 'required|boolean'
        ]);
        $cortina->update($request->all());
        return redirect()->route('cortinas.index')->with('success', 'Cortina actualizada correctamente');
    }

    public function destroy(Cortina $cortina) {
        $cortina->delete();
        return redirect()->route('cortinas.index')->with('success', 'Cortina eliminada correctamente');
    }
}