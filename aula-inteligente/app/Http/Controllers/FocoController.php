<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Foco;
use App\Models\Aula;

class FocoController extends Controller
{
    public function index() {
        $focos = Foco::with('aula')->get();
        return view('focos.index', compact('focos'));
    }

    public function create() {
        $aulas = Aula::all();
        return view('focos.create', compact('aulas'));
    }

    public function store(Request $request) {
        $request->validate([
            'aula_id' => 'required|exists:aulas,id',
            'estado' => 'required|boolean'
        ]);
        Foco::create($request->all());
        return redirect()->route('focos.index')->with('success', 'Foco creado correctamente');
    }

    public function edit(Foco $foco) {
        $aulas = Aula::all();
        return view('focos.edit', compact('foco', 'aulas'));
    }

    public function update(Request $request, Foco $foco) {
        $request->validate([
            'aula_id' => 'required|exists:aulas,id',
            'estado' => 'required|boolean'
        ]);
        $foco->update($request->all());
        return redirect()->route('focos.index')->with('success', 'Foco actualizado correctamente');
    }

    public function destroy(Foco $foco) {
        $foco->delete();
        return redirect()->route('focos.index')->with('success', 'Foco eliminado correctamente');
    }
}
