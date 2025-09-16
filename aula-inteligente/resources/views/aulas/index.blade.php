@extends('layouts.app')

@section('title', 'Aulas')

@section('content')
<div class="container my-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold" style="color: #5D7B6F;">Aulas</h1>
        <a href="{{ route('aulas.create') }}" class="btn btn-primary" style="background-color: #5D7B6F; border-color: #5D7B6F; border-radius: 0.75rem;">
            <i class="fas fa-plus-circle me-2"></i>Crear nueva aula
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
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Capacidad</th>
                        <th scope="col" class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($aulas as $aula)
                        <tr>
                            <td>{{ $aula->id }}</td>
                            <td>{{ $aula->nombre }}</td>
                            <td>{{ $aula->capacidad }}</td>
                            <td class="text-center">
                                <a href="{{ route('aulas.edit', $aula) }}" class="btn btn-sm btn-outline-info" style="border-radius: 0.5rem;">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('aulas.destroy', $aula) }}" method="POST" class="d-inline"
                                    onsubmit="return confirm('¿Seguro que deseas eliminar esta aula?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger" style="border-radius: 0.5rem;">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">No hay aulas registradas.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection