<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mueble;
use App\Models\Aula;

class MuebleController extends Controller
{
    public function index() {
        $muebles = Mueble::with('aula')->get();
        return view('muebles.index', compact('muebles'));
    }

    public function create() {
        $aulas = Aula::all();
        return view('muebles.create', compact('aulas'));
    }

    public function store(Request $request) {
        $request->validate([
            'aula_id' => 'required|exists:aulas,id',
            'tipo' => 'required|string|max:255',
            'cantidad' => 'required|integer|min:1'
        ]);
        Mueble::create($request->all());
        return redirect()->route('muebles.index')->with('success', 'Mueble creado correctamente');
    }

    public function edit(Mueble $mueble) {
        $aulas = Aula::all();
        return view('muebles.edit', compact('mueble', 'aulas'));
    }

    public function update(Request $request, Mueble $mueble) {
        $request->validate([
            'aula_id' => 'required|exists:aulas,id',
            'tipo' => 'required|string|max:255',
            'cantidad' => 'required|integer|min:1'
        ]);
        $mueble->update($request->all());
        return redirect()->route('muebles.index')->with('success', 'Mueble actualizado correctamente');
    }

    public function destroy(Mueble $mueble) {
        $mueble->delete();
        return redirect()->route('muebles.index')->with('success', 'Mueble eliminado correctamente');
    }
}
