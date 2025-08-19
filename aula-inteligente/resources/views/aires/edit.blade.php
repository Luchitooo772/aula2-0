@extends('layouts.app')

@section('content')
<h1>Editar Aire Acondicionado</h1>
<form action="{{ route('aires.update', $aire->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label>Aula:</label>
    <select name="aula_id" required>
        @foreach($aulas as $aula)
            <option value="{{ $aula->id }}" @if($aire->aula_id == $aula->id) selected @endif>{{ $aula->nombre }}</option>
        @endforeach
    </select>
    <br>
    <label>Estado:</label>
    <select name="estado" required>
        <option value="Encendido" @if($aire->estado=='Encendido') selected @endif>Encendido</option>
        <option value="Apagado" @if($aire->estado=='Apagado') selected @endif>Apagado</option>
    </select>
    <br>
    <label>Temperatura:</label>
    <input type="number" name="temperatura" value="{{ $aire->temperatura }}" required>
    <br>
    <button type="submit">Actualizar</button>
</form>
<a href="{{ route('aires.index') }}">Volver</a>
@endsection
