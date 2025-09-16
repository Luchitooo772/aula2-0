@extends('layouts.app')

@section('title', 'Editar Reserva')

@section('content')
<div class="container my-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold" style="color: #5D7B6F;">Editar Reserva</h1>
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
        <form action="{{ route('reservas.update', $reserva->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label for="aula_id" class="form-label" style="color: #5D7B6F;">Aula</label>
                <select class="form-select" id="aula_id" name="aula_id" required>
                    @foreach($aulas as $aula)
                        <option value="{{ $aula->id }}" @if($reserva->aula_id == $aula->id) selected @endif>{{ $aula->nombre }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="mb-3">
                <label for="materia_id" class="form-label" style="color: #5D7B6F;">Materia</label>
                <select class="form-select" id="materia_id" name="materia_id" required>
                    @foreach($materias as $materia)
                        <option value="{{ $materia->id }}" @if($reserva->materia_id == $materia->id) selected @endif>{{ $materia->nombre }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="mb-3">
                <label for="fecha" class="form-label" style="color: #5D7B6F;">Fecha</label>
                <input type="date" class="form-control" id="fecha" name="fecha" value="{{ old('fecha', $reserva->fecha) }}" required>
            </div>
            
            <div class="mb-3">
                <label for="hora_inicio" class="form-label" style="color: #5D7B6F;">Hora inicio</label>
                <input type="time" class="form-control" id="hora_inicio" name="hora_inicio" value="{{ old('hora_inicio', $reserva->hora_inicio) }}" required>
            </div>
            
            <div class="mb-3">
                <label for="hora_fin" class="form-label" style="color: #5D7B6F;">Hora fin</label>
                <input type="time" class="form-control" id="hora_fin" name="hora_fin" value="{{ old('hora_fin', $reserva->hora_fin) }}" required>
            </div>
            
            <div class="d-flex justify-content-end gap-2 mt-4">
                <a href="{{ route('reservas.index') }}" class="btn btn-secondary" style="border-radius: 0.5rem;">
                    Volver
                </a>
                <button type="submit" class="btn btn-primary" style="background-color: #5D7B6F; border-color: #5D7B6F; border-radius: 0.5rem;">
                    Actualizar
                </button>
            </div>
        </form>
    </div>
</div>
@endsection