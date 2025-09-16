@extends('layouts.app')

@section('title', 'Muebles')

@section('content')
<div class="container my-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold" style="color: #5D7B6F;">Muebles</h1>
        <a href="{{ route('muebles.create') }}" class="btn btn-primary" style="background-color: #5D7B6F; border-color: #5D7B6F; border-radius: 0.75rem;">
            <i class="fas fa-plus-circle me-2"></i>Crear nuevo mueble
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
                        <th scope="col">Tipo</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col" class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($muebles as $mueble)
                    <tr>
                        <td>{{ $mueble->id }}</td>
                        <td>{{ $mueble->aula->nombre ?? '' }}</td>
                        <td>{{ $mueble->tipo }}</td>
                        <td>{{ $mueble->cantidad }}</td>
                        <td class="text-center">
                            <a href="{{ route('muebles.edit', $mueble->id) }}" class="btn btn-sm btn-outline-info" style="border-radius: 0.5rem;">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('muebles.destroy', $mueble->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro de que quieres eliminar este elemento?')">
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
                        <td colspan="5" class="text-center text-muted">No hay muebles registrados.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection