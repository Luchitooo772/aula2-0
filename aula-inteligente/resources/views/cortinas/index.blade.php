@extends('layouts.app')

@section('content')
<div class="container my-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold" style="color: #5D7B6F;">Cortinas</h1>
        <a href="{{ route('cortinas.create') }}" class="btn btn-primary" style="background-color: #5D7B6F; border-color: #5D7B6F; border-radius: 0.75rem;">
            <i class="fas fa-plus-circle me-2"></i>Crear nueva cortina
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
                        <th scope="col" class="text-white">ID</th>
                        <th scope="col" class="text-white">Aula</th>
                        <th scope="col" class="text-white">Estado</th>
                        <th scope="col" class="text-center text-white">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cortinas as $cortina)
                    <tr>
                        <td>{{ $cortina->id }}</td>
                        <td>{{ $cortina->aula->nombre ?? '' }}</td>
                        <td>
                            @if($cortina->estado == 'Abierto')
                                <span class="badge bg-success">{{ $cortina->estado }}</span>
                            @else
                                <span class="badge bg-danger">{{ $cortina->estado }}</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <a href="{{ route('cortinas.edit', $cortina->id) }}" class="btn btn-sm btn-outline-info" style="border-radius: 0.5rem;">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('cortinas.destroy', $cortina->id) }}" method="POST" style="display:inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger" style="border-radius: 0.5rem;" onclick="return confirm('¿Estás seguro de que quieres eliminar este elemento?')">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection