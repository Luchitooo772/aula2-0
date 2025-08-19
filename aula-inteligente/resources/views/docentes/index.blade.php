@extends('layouts.app')

@section('title','Docentes')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2 class="mb-0">Docentes</h2>
    <a href="{{ route('docentes.create') }}" class="btn btn-primary">Nuevo docente</a>
</div>

<div class="card p-3">
    <div class="table-responsive">
        <table class="table table-striped table-hover align-middle">
            <thead class="table-primary">
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($docentes as $docente)
                    <tr>
                        <td>{{ $docente->id }}</td>
                        <td>{{ $docente->nombre }}</td>
                        <td>{{ $docente->email }}</td>
                        <td class="text-center">
                            <a href="{{ route('docentes.show',$docente) }}" class="btn btn-sm btn-outline-secondary">Ver</a>
                            <a href="{{ route('docentes.edit',$docente) }}" class="btn btn-sm btn-outline-warning">Editar</a>
                            <form action="{{ route('docentes.destroy',$docente) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('¿Seguro que deseas eliminar este docente?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="text-center text-muted">No hay docentes cargados.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Paginación si usás ->paginate() en el controlador --}}
    @if(method_exists($docentes, 'links'))
        <div class="mt-2">
            {{ $docentes->links() }}
        </div>
    @endif
</div>
@endsection
