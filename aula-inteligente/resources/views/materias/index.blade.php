@extends('layouts.app')

@section('content')
<h1>Materias</h1>
<a href="{{ route('materias.create') }}">Crear nueva materia</a>

@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

<table border="1" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Docente</th>
        <th>Acciones</th>
    </tr>
    @foreach($materias as $materia)
    <tr>
        <td>{{ $materia->id }}</td>
        <td>{{ $materia->nombre }}</td>
        <td>{{ $materia->docente->nombre ?? '' }} {{ $materia->docente->apellido ?? '' }}</td>
        <td>
            <a href="{{ route('materias.edit', $materia->id) }}">Editar</a>
            <form action="{{ route('materias.destroy', $materia->id) }}" method="POST" style="display:inline">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('¿Seguro?')">Eliminar</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection
