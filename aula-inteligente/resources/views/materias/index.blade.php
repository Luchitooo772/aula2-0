@extends('layouts.app')

@section('title', 'Materias')

@section('content')
<div class="container my-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold" style="color: #5D7B6F;">Materias</h1>
        <a href="{{ route('materias.create') }}" class="btn btn-primary" style="background-color: #5D7B6F; border-color: #5D7B6F; border-radius: 0.75rem;">
            <i class="fas fa-plus-circle me-2"></i>Crear nueva materia
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
                        <th scope="col">Docente</th>
                        <th scope="col">Días</th>
                        <th scope="col">Horario</th>
                        <th scope="col">Aulas</th>
                        <th scope="col" class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($materias as $materia)
                        <tr>
                            <td>{{ $materia->id }}</td>
                            <td>{{ $materia->nombre }}</td>
                            <td>{{ $materia->docente->nombre ?? '' }} {{ $materia->docente->apellido ?? '' }}</td>
                            <td>{{ $materia->dias }}</td>
                            <td>{{ $materia->horario }}</td>
                            <td>
                                @foreach($materia->aulas as $aula)
                                    <span class="badge" style="background-color: #A4C3A2;">{{ $aula->nombre }}</span>
                                @endforeach
                            </td>
                            <td class="text-center">
                                <a href="{{ route('materias.edit',$materia) }}" class="btn btn-sm btn-outline-info" style="border-radius: 0.5rem;">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('materias.destroy',$materia) }}" method="POST" class="d-inline"
                                    onsubmit="return confirm('¿Seguro que deseas eliminar esta materia?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" style="border-radius: 0.5rem;">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted">No hay materias cargadas.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if(method_exists($materias, 'links'))
            <div class="mt-4 d-flex justify-content-center">
                {{ $materias->links() }}
            </div>
        @endif
    </div>
</div>
@endsection