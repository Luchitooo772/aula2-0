@extends('layouts.app')

@section('content')
<h1>Crear Aula</h1>
<form action="{{ route('aulas.store') }}" method="POST">
    @csrf
    <label>Nombre:</label>
    <input type="text" name="nombre" required>
    <br>
    <label>Capacidad:</label>
    <input type="number" name="capacidad" required>
    <br>
    <button type="submit">Guardar</button>
</form>
<a href="{{ route('aulas.index') }}">Volver</a>
@endsection
