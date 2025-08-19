<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserva;
use App\Models\Aula;
use App\Models\Materia;

class ReservaController extends Controller
{
    public function index() {
        $reservas = Reserva::with('aula', 'materia')->get();
        return view('reservas.index', compact('reservas'));
    }

    public function create() {
        $aulas = Aula::all();
        $materias = Materia::all();
        return view('reservas.create', compact('aulas', 'materias'));
    }

    public function store(Request $request) {
        $request->validate([
            'aula_id' => 'required|exists:aulas,id',
            'materia_id' => 'required|exists:materias,id',
            'fecha' => 'required|date',
            'hora_inicio' => 'required',
            'hora_fin' => 'required'
        ]);
        Reserva::create($request->all());
        return redirect()->route('reservas.index')->with('success', 'Reserva creada correctamente');
    }

    public function edit(Reserva $reserva) {
        $aulas = Aula::all();
        $materias = Materia::all();
        return view('reservas.edit', compact('reserva', 'aulas', 'materias'));
    }

    public function update(Request $request, Reserva $reserva) {
        $request->validate([
            'aula_id' => 'required|exists:aulas,id',
            'materia_id' => 'required|exists:materias,id',
            'fecha' => 'required|date',
            'hora_inicio' => 'required',
            'hora_fin' => 'required'
        ]);
        $reserva->update($request->all());
        return redirect()->route('reservas.index')->with('success', 'Reserva actualizada correctamente');
    }

    public function destroy(Reserva $reserva) {
        $reserva->delete();
        return redirect()->route('reservas.index')->with('success', 'Reserva eliminada correctamente');
    }
}
