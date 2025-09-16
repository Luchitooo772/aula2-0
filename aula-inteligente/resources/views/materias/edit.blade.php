@extends('layouts.app')

@section('title', 'Editar Materia')

@section('content')
<div class="container my-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold" style="color: #5D7B6F;">Editar Materia</h1>
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
        <form action="{{ route('materias.update', $materia->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label for="nombre" class="form-label" style="color: #5D7B6F;">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', $materia->nombre) }}" required>
            </div>
            
            <div class="mb-3">
                <label for="docente_id" class="form-label" style="color: #5D7B6F;">Docente</label>
                <select class="form-select" id="docente_id" name="docente_id" required>
                    @foreach($docentes as $docente)
                        <option value="{{ $docente->id }}" @if($materia->docente_id == $docente->id) selected @endif>{{ $docente->nombre }} {{ $docente->apellido }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="mb-3">
                <label for="horario" class="form-label" style="color: #5D7B6F;">Horario</label>
                <select class="form-select" id="horario" name="horario">
                    <option value="">Seleccionar</option>
                    <option value="7:40-8:15" @if($materia->horario == '7:40-8:15') selected @endif>7:40-8:15</option>
                    <option value="8:25-9:05" @if($materia->horario == '8:25-9:05') selected @endif>8:25-9:05</option>
                    <option value="9:05-9:40" @if($materia->horario == '9:05-9:40') selected @endif>9:05-9:40</option>
                    <option value="9:50-10:30" @if($materia->horario == '9:50-10:30') selected @endif>9:50-10:30</option>
                    <option value="10:30-11:05" @if($materia->horario == '10:30-11:05') selected @endif>10:30-11:05</option>
                    <option value="11:15-11:55" @if($materia->horario == '11:15-11:55') selected @endif>11:15-11:55</option>
                    <option value="11:55-12:30" @if($materia->horario == '11:55-12:30') selected @endif>11:55-12:30</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="dias" class="form-label" style="color: #5D7B6F;">Días</label>
                <select class="form-select" id="dias" name="dias">
                    <option value="">Seleccionar</option>
                    <option value="Lunes" @if($materia->dias == 'Lunes') selected @endif>Lunes</option>
                    <option value="Martes" @if($materia->dias == 'Martes') selected @endif>Martes</option>
                    <option value="Miércoles" @if($materia->dias == 'Miércoles') selected @endif>Miércoles</option>
                    <option value="Jueves" @if($materia->dias == 'Jueves') selected @endif>Jueves</option>
                    <option value="Viernes" @if($materia->dias == 'Viernes') selected @endif>Viernes</option>
                </select>
            </div>
            
            <div class="mb-3">
                <label for="aulas" class="form-label" style="color: #5D7B6F;">Aulas</label>
                <select class="form-select" id="aulas" name="aulas[]" multiple>
                    @foreach($aulas as $aula)
                        <option value="{{ $aula->id }}" @if($materia->aulas->contains($aula->id)) selected @endif>{{ $aula->nombre }}</option>
                    @endforeach
                </select>
                <small class="form-text text-muted">Mantén presionada la tecla Ctrl (o Cmd en Mac) para seleccionar varias aulas.</small>
            </div>
            
            <div class="d-flex justify-content-end gap-2 mt-4">
                <a href="{{ route('materias.index') }}" class="btn btn-secondary" style="border-radius: 0.5rem;">
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
