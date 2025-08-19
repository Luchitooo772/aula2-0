@extends('layouts.app')

@section('content')
<h1>Crear Materia</h1>
<form action="{{ route('materias.store') }}" method="POST">
    @csrf
    <label>Nombre:</label>
    <input type="text" name="nombre" required>
    <br>
    <label>Docente:</label>
    <select name="docente_id" required>
        <option value="">Seleccionar</option>
        @foreach($docentes as $docente)
            <option value="{{ $docente->id }}">{{ $docente->nombre }} {{ $docente->apellido }}</option>
        @endforeach
    </select>
    <br>
    <button type="submit">Guardar</button>
</form>
<a href="{{ route('materias.index') }}">Volver</a>
@endsection
