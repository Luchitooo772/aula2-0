@extends('layouts.app')

@section('content')
<h1>Crear Mueble</h1>
<form action="{{ route('muebles.store') }}" method="POST">
    @csrf
    <label>Aula:</label>
    <select name="aula_id" required>
        <option value="">Seleccionar</option>
        @foreach($aulas as $aula)
            <option value="{{ $aula->id }}">{{ $aula->nombre }}</option>
        @endforeach
    </select>
    <br>
    <label>Tipo:</label>
    <input type="text" name="tipo" required>
    <br>
    <label>Cantidad:</label>
    <input type="number" name="cantidad" required>
    <br>
    <button type="submit">Guardar</button>
</form>
<a href="{{ route('muebles.index') }}">Volver</a>
@endsection
