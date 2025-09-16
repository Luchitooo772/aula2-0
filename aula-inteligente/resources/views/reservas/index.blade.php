@extends('layouts.app')

@section('title', 'Reservas')

@section('content')
<div class="container my-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold" style="color: #5D7B6F;">Reservas</h1>
        <a href="{{ route('reservas.create') }}" class="btn btn-primary" style="background-color: #5D7B6F; border-color: #5D7B6F; border-radius: 0.75rem;">
            <i class="fas fa-plus-circle me-2"></i>Crear nueva reserva
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card p-4 shadow-lg rounded-3">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead style="background-color: #BDD4B8; color: #5D7B6F;">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Aula</th>
                        <th scope="col">Materia</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Hora Inicio</th>
                        <th scope="col">Hora Fin</th>
                        <th scope="col" class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($reservas as $reserva)
                    <tr>
                        <td>{{ $reserva->id }}</td>
                        <td>{{ $reserva->aula->nombre ?? '' }}</td>
                        <td>{{ $reserva->materia->nombre ?? '' }}</td>
                        <td>{{ $reserva->fecha }}</td>
                        <td>{{ $reserva->hora_inicio }}</td>
                        <td>{{ $reserva->hora_fin }}</td>
                        <td class="text-center">
                            <a href="{{ route('reservas.edit', $reserva->id) }}" class="btn btn-sm btn-outline-info" style="border-radius: 0.5rem;">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('reservas.destroy', $reserva->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro de que quieres eliminar esta reserva?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger" style="border-radius: 0.5rem;">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted">No hay reservas registradas.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection