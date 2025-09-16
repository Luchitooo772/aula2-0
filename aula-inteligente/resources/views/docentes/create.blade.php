@extends('layouts.app')

@section('title', 'Crear Docente')

@section('content')
<div class="container my-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold" style="color: #5D7B6F;">Crear Docente</h1>
    </div>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card p-4 shadow-lg rounded-3">
        <form action="{{ route('docentes.store') }}" method="POST">
            @csrf
            
            <div class="mb-3">
                <label for="nombre" class="form-label" style="color: #5D7B6F;">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}" required>
            </div>
            
            <div class="mb-3">
                <label for="apellido" class="form-label" style="color: #5D7B6F;">Apellido</label>
                <input type="text" class="form-control" id="apellido" name="apellido" value="{{ old('apellido') }}" required>
            </div>
            
            <div class="mb-3">
                <label for="email" class="form-label" style="color: #5D7B6F;">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
            </div>
            
            <div class="d-flex justify-content-end gap-2 mt-4">
                <a href="{{ route('docentes.index') }}" class="btn btn-secondary" style="border-radius: 0.5rem;">
                    Volver
                </a>
                <button type="submit" class="btn btn-primary" style="background-color: #5D7B6F; border-color: #5D7B6F; border-radius: 0.5rem;">
                    Guardar
                </button>
            </div>
        </form>
    </div>
</div>
@endsection