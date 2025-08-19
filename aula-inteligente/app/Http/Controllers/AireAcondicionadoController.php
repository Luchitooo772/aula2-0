<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AireAcondicionado;
use App\Models\Aula;

class AireAcondicionadoController extends Controller
{
    public function index() {
        $aires = AireAcondicionado::with('aula')->get();
        return view('aires.index', compact('aires'));
    }

    public function create() {
        $aulas = Aula::all();
        return view('aires.create', compact('aulas'));
    }

    public function store(Request $request) {
        $request->validate([
            'aula_id' => 'required|exists:aulas,id',
            'estado' => 'required|boolean',
            'temperatura' => 'nullable|integer'
        ]);
        AireAcondicionado::create($request->all());
        return redirect()->route('aires.index')->with('success', 'Aire acondicionado creado correctamente');
    }

    public function edit(AireAcondicionado $aire) {
        $aulas = Aula::all();
        return view('aires.edit', compact('aire', 'aulas'));
    }

    public function update(Request $request, AireAcondicionado $aire) {
        $request->validate([
            'aula_id' => 'required|exists:aulas,id',
            'estado' => 'required|boolean',
            'temperatura' => 'nullable|integer'
        ]);
        $aire->update($request->all());
        return redirect()->route('aires.index')->with('success', 'Aire acondicionado actualizado correctamente');
    }

    public function destroy(AireAcondicionado $aire) {
        $aire->delete();
        return redirect()->route('aires.index')->with('success', 'Aire acondicionado eliminado correctamente');
    }
}
