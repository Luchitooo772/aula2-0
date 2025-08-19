@extends('layouts.app')

@section('content')
<h1>Crear Reserva</h1>
<form action="{{ route('reservas.store') }}" method="POST">
    @csrf
    <label>Aula:</label>
    <select name="aula_id" required>
        <option value="">Seleccionar</option>
        @foreach($aulas as $aula)
            <option value="{{ $aula->id }}">{{ $aula->nombre }}</option>
        @endforeach
    </select>
    <br>
    <label>Materia:</label>
    <select name="materia_id" required>
        <option value="">Seleccionar</option>
        @foreach($materias as $materia)
            <option value="{{ $materia->id }}">{{ $materia->nombre }}</option>
        @endforeach
    </select>
    <br>
    <label>Fecha:</label>
    <input type="date" name="fecha" required>
    <br>
    <label>Hora inicio:</label>
    <input type="time" name="hora_inicio" required>
    <br>
    <label>Hora fin:</label>
    <input type="time" name="hora_fin" required>
    <br>
    <button type="submit">Guardar</button>
</form>
<a href="{{ route('reserv
