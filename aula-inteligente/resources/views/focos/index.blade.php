@extends('layouts.app')

@section('content')
<h1>Focos</h1>
<a href="{{ route('focos.create') }}">Crear nuevo foco</a>

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
    @foreach($focos as $foco)
    <tr>
        <td>{{ $foco->id }}</td>
        <td>{{ $foco->aula->nombre ?? '' }}</td>
        <td>{{ $foco->estado }}</td>
        <td>
            <a href="{{ route('focos.edit', $foco->id) }}">Editar</a>
            <form action="{{ route('focos.destroy', $foco->id) }}" method="POST" style="display:inline">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('¿Seguro?')">Eliminar</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection
