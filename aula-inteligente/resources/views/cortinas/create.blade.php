@extends('layouts.app')

@section('content')
<h1>Crear Cortina</h1>
<form action="{{ route('cortinas.store') }}" method="POST">
    @csrf
    <label>Aula:</label>
    <select name="aula_id" required>
        <option value="">Seleccionar</option>
        @foreach($aulas as $aula)
            <option value="{{ $aula->id }}">{{ $aula->nombre }}</option>
        @endforeach
    </select>
    <br>
    <label>Estado:</label>
    <select name="estado" required>
        <option value="Abierta">Abierta</option>
        <option value="Cerrada">Cerrada</option>
    </select>
    <br>
    <button type="submit">Guardar</button>
</form>
<a href="{{ route('cortinas.index') }}">Volver</a>
@endsection
