@extends('layouts.app')

@section('content')
<h1>Reservas</h1>
<a href="{{ route('reservas.create') }}">Crear nueva reserva</a>

@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

<table border="1" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>Aula</th>
        <th>Materia</th>
        <th>Fecha</th>
        <th>Hora Inicio</th>
        <th>Hora Fin</th>
        <th>Acciones</th>
    </tr>
    @foreach($reservas as $reserva)
    <tr>
        <td>{{ $reserva->id }}</td>
        <td>{{ $reserva->aula->nombre ?? '' }}</td>
        <td>{{ $reserva->materia->nombre ?? '' }}</td>
        <td>{{ $reserva->fecha }}</td>
        <td>{{ $reserva->hora_inicio }}</td>
        <td>{{ $reserva->hora_fin }}</td>
        <td>
            <a href="{{ route('reservas.edit', $reserva->id) }}">Editar</a>
            <form action="{{ route('reservas.destroy', $reserva->id) }}" method="POST" style="display:inline">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('¿Seguro?')">Eliminar</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection
