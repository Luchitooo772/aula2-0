@extends('layouts.app')

@section('content')
<h1>Aulas</h1>
<a href="{{ route('aulas.create') }}">Crear nueva aula</a>

@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

<table border="1" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Capacidad</th>
        <th>Acciones</th>
    </tr>
    @foreach($aulas as $aula)
    <tr>
        <td>{{ $aula->id }}</td>
        <td>{{ $aula->nombre }}</td>
        <td>{{ $aula->capacidad }}</td>
        <td>
            <a href="{{ route('aulas.edit', $aula->id) }}">Editar</a>
            <form action="{{ route('aulas.destroy', $aula->id) }}" method="POST" style="display:inline">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('¿Seguro?')">Eliminar</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection
