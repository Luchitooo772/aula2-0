@extends('layouts.app')

@section('content')
<h1>Muebles</h1>
<a href="{{ route('muebles.create') }}">Crear nuevo mueble</a>

@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

<table border="1" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>Aula</th>
        <th>Tipo</th>
        <th>Cantidad</th>
        <th>Acciones</th>
    </tr>
    @foreach($muebles as $mueble)
    <tr>
        <td>{{ $mueble->id }}</td>
        <td>{{ $mueble->aula->nombre ?? '' }}</td>
        <td>{{ $mueble->tipo }}</td>
        <td>{{ $mueble->cantidad }}</td>
        <td>
            <a href="{{ route('muebles.edit', $mueble->id) }}">Editar</a>
            <form action="{{ route('muebles.destroy', $mueble->id) }}" method="POST" style="display:inline">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('¿Seguro?')">Eliminar</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection
