@extends('layouts.app')

@section('content')
<h1>Aires Acondicionados</h1>
<a href="{{ route('aires.create') }}">Crear nuevo aire</a>

@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

<table border="1" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>Aula</th>
        <th>Estado</th>
        <th>Temperatura</th>
        <th>Acciones</th>
    </tr>
    @foreach($aires as $aire)
    <tr>
        <td>{{ $aire->id }}</td>
        <td>{{ $aire->aula->nombre ?? '' }}</td>
        <td>{{ $aire->estado }}</td>
        <td>{{ $aire->temperatura }}°C</td>
        <td>
            <a href="{{ route('aires.edit', $aire->id) }}">Editar</a>
            <form action="{{ route('aires.destroy', $aire->id) }}" method="POST" style="display:inline">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('¿Seguro?')">Eliminar</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection
