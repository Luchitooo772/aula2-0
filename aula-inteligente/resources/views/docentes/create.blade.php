@extends('layouts.app')

@section('content')
<h1>Crear Docente</h1>
<form action="{{ route('docentes.store') }}" method="POST">
    @csrf
    <label>Nombre:</label>
    <input type="text" name="nombre" required>
    <br>
    <label>Apellido:</label>
    <input type="text" name="apellido" required>
    <br>
    <button type="submit">Guardar</button>
</form>
<a href="{{ route('docentes.index') }}">Volver</a>
@endsection
