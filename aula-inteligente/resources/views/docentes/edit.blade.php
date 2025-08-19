@extends('layouts.app')

@section('content')
<h1>Editar Docente</h1>
<form action="{{ route('docentes.update', $docente->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label>Nombre:</label>
    <input type="text" name="nombre" value="{{ $docente->nombre }}" required>
    <br>
    <label>Apellido:</label>
    <input type="text" name="apellido" value="{{ $docente->apellido }}" required>
    <br>
    <button type="submit">Actualizar</button>
</form>
<a href="{{ route('docentes.index') }}">Volver</a>
@endsection
