@extends('layouts.app')

@section('content')
<h1>Cortinas</h1>
<a href="{{ route('cortinas.create') }}">Crear nueva cortina</a>

@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

<table border="1" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>Aula</th>
        <th>Estado</th>
        <th>Acciones</th>
    </tr>
    @foreach($cortinas as $cortina)
    <tr>
        <td>{{ $cortina->id }}</td>
        <td>{{ $cortina->aula->nombre ?? '' }}</td>
        <td>{{ $cortina->estado }}</td>
        <td>
            <a href="{{ route('cortinas.edit', $cortina->id) }}">Editar</a>
            <form action="{{ route('cortinas.destroy', $cortina->id) }}" method="POST" style="display:inline">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('¿Seguro?')">Eliminar</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection
