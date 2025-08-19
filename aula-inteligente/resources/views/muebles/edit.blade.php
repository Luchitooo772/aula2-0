@extends('layouts.app')

@section('content')
<h1>Editar Mueble</h1>
<form action="{{ route('muebles.update', $mueble->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label>Aula:</label>
    <select name="aula_id" required>
        @foreach($aulas as $aula)
            <option value="{{ $aula->id }}" @if($mueble->aula_id == $aula->id) selected @endif>{{ $aula->nombre }}</option>
        @endforeach
    </select>
    <br>
    <label>Tipo:</label>
    <input type="text" name="tipo" value="{{ $mueble->tipo }}" required>
    <br>
    <label>Cantidad:</label>
    <input type="number" name="cantidad" value="{{ $mueble->cantidad }}" required>
    <br>
    <button type="submit">Actualizar</button>
</form>
<a href="{{ route('muebles.index') }}">Volver</a>
@endsection
