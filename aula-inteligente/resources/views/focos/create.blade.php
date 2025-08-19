@extends('layouts.app')

@section('content')
<h1>Crear Foco</h1>
<form action="{{ route('focos.store') }}" method="POST">
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
        <option value="Encendido">Encendido</option>
        <option value="Apagado">Apagado</option>
    </select>
    <br>
    <button type="submit">Guardar</button>
</form>
<a href="{{ route('focos.index') }}">Volver</a>
@endsection
