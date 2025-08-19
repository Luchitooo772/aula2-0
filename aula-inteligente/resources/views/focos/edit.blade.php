@extends('layouts.app')

@section('content')
<h1>Editar Foco</h1>
<form action="{{ route('focos.update', $foco->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label>Aula:</label>
    <select name="aula_id" required>
        @foreach($aulas as $aula)
            <option value="{{ $aula->id }}" @if($foco->aula_id == $aula->id) selected @endif>{{ $aula->nombre }}</option>
        @endforeach
    </select>
    <br>
    <label>Estado:</label>
    <select name="estado" required>
        <option value="Encendido" @if($foco->estado=='Encendido') selected @endif>Encendido</option>
        <option value="Apagado" @if($foco->estado=='Apagado') selected @endif>Apagado</option>
    </select>
    <br>
    <button type="submit">Actualizar</button>
</form>
<a href="{{ route('focos.index') }}">Volver</a>
@endsection
