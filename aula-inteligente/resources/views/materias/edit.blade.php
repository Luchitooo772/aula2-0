@extends('layouts.app')

@section('content')
<h1>Editar Materia</h1>
<form action="{{ route('materias.update', $materia->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label>Nombre:</label>
    <input type="text" name="nombre" value="{{ $materia->nombre }}" required>
    <br>
    <label>Docente:</label>
    <select name="docente_id" required>
        @foreach($docentes as $docente)
            <option value="{{ $docente->id }}" @if($materia->docente_id == $docente->id) selected @endif>{{ $docente->nombre }} {{ $docente->apellido }}</option>
        @endforeach
    </select>
    <br>
    <button type="submit">Actualizar</button>
</form>
<a href="{{ route('materias.index') }}">Volver</a>
@endsection
