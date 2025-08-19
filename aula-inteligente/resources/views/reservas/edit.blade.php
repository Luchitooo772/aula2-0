@extends('layouts.app')

@section('content')
<h1>Editar Reserva</h1>
<form action="{{ route('reservas.update', $reserva->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label>Aula:</label>
    <select name="aula_id" required>
        @foreach($aulas as $aula)
            <option value="{{ $aula->id }}" @if($reserva->aula_id == $aula->id) selected @endif>{{ $aula->nombre }}</option>
        @endforeach
    </select>
    <br>
    <label>Materia:</label>
    <select name="materia_id" required>
        @foreach($materias as $materia)
            <option value="{{ $materia->id }}" @if($reserva->materia_id == $materia->id) selected @endif>{{ $materia->nombre }}</option>
        @endforeach
    </select>
    <br>
    <label>Fecha:</label>
    <input type="date" name="fecha" value="{{ $reserva->fecha }}" required>
    <br>
    <label>Hora inicio:</label>
    <input type="time" name="hora_inicio" value="{{ $reserva->hora_inicio }}" required>
    <br>
    <label>Hora fin:</label>
    <input type="time" name="hora_fin" value="{{ $reserva->hora_fin }}" required>
    <br>
    <button type="submit">Actualizar</button>
</form>
<a href="{{ route('reservas.index') }}">Volver</a>
@endsection
