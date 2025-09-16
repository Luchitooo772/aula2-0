@extends('layouts.app')

@section('title', 'Aires Acondicionados')

@section('content')
<div class="container my-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold" style="color: #5D7B6F;">Aires Acondicionados</h1>
        <a href="{{ route('aires.create') }}" class="btn btn-primary" style="background-color: #5D7B6F; border-color: #5D7B6F; border-radius: 0.75rem;">
            <i class="fas fa-plus-circle me-2"></i>Crear nuevo aire
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
                        <th scope="col">Estado</th>
                        <th scope="col">Temperatura</th>
                        <th scope="col" class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($aires as $aire)
                    <tr>
                        <td>{{ $aire->id }}</td>
                        <td>{{ $aire->aula->nombre ?? '' }}</td>
                        <td>
                            @if($aire->estado)
                                <span class="badge" style="background-color: #A4C3A2;">Encendido</span>
                            @else
                                <span class="badge" style="background-color: #DD6E42;">Apagado</span>
                            @endif
                        </td>
                        <td>{{ $aire->temperatura }}°C</td>
                        <td class="text-center">
                            <a href="{{ route('aires.edit', $aire->id) }}" class="btn btn-sm btn-outline-info" style="border-radius: 0.5rem;">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('aires.destroy', $aire->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro de que quieres eliminar este elemento?')">
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
                        <td colspan="5" class="text-center text-muted">No hay aires acondicionados registrados.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection