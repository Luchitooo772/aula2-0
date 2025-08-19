@extends('layouts.app')

@section('content')
<h1>Editar Cortina</h1>
<form action="{{ route('cortinas.update', $cortina->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label>Aula:</label>
    <select name="aula_id" required>
        @foreach($aulas as $aula)
            <option value="{{ $aula->id }}" @if($cortina->aula_id == $aula->id) selected @endif>{{ $aula->nombre }}</option>
        @endforeach
    </select>
    <br>
    <label>Estado:</label>
    <select name="estado" required>
        <option value="Abierta" @if($cortina->estado=='Abierta') selected @endif>Abierta</option>
        <option value="Cerrada" @if($cortina->estado=='Cerrada') selected @endif>Cerrada</option>
    </select>
    <br>
    <button type="submit">Actualizar</button>
</form>
<a href="{{ route('cortinas.index') }}">Volver</a>
@endsection
