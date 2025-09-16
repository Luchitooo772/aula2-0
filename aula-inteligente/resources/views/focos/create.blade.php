@extends('layouts.app')

@section('title', 'Crear Foco')

@section('content')
<div class="container my-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold" style="color: #5D7B6F;">Crear Foco</h1>
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
        <form action="{{ route('focos.store') }}" method="POST">
            @csrf
            
            <div class="mb-3">
                <label for="aula_id" class="form-label" style="color: #5D7B6F;">Aula</label>
                <select class="form-select" id="aula_id" name="aula_id" required>
                    <option value="">Seleccionar</option>
                    @foreach($aulas as $aula)
                        <option value="{{ $aula->id }}" @if(old('aula_id') == $aula->id) selected @endif>{{ $aula->nombre }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="mb-3">
                <label for="estado" class="form-label" style="color: #5D7B6F;">Estado</label>
                <select class="form-select" id="estado" name="estado" required>
                    <option value="1" @if(old('estado') == '1') selected @endif>Encendido</option>
                    <option value="0" @if(old('estado') == '0') selected @endif>Apagado</option>
                </select>
            </div>
            
            <div class="mb-3">
                <label for="intensidad" class="form-label" style="color: #5D7B6F;">Intensidad: <span id="intensidadValue">100</span>%</label>
                <input type="range" class="form-range" id="intensidad" name="intensidad" min="0" max="100" value="{{ old('intensidad', 100) }}" oninput="document.getElementById('intensidadValue').innerText = this.value" required>
            </div>
            
            <div class="d-flex justify-content-end gap-2 mt-4">
                <a href="{{ route('focos.index') }}" class="btn btn-secondary" style="border-radius: 0.5rem;">
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