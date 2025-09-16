@extends('layouts.app')

@section('title', 'Editar Aire Acondicionado')

@section('content')
<div class="container my-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold" style="color: #5D7B6F;">Editar Aire Acondicionado</h1>
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
        <form action="{{ route('aires.update', $aire->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label for="aula_id" class="form-label" style="color: #5D7B6F;">Aula</label>
                <select class="form-select" id="aula_id" name="aula_id" required>
                    @foreach($aulas as $aula)
                        <option value="{{ $aula->id }}" @if($aire->aula_id == $aula->id) selected @endif>{{ $aula->nombre }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="mb-3">
                <label for="estado" class="form-label" style="color: #5D7B6F;">Estado</label>
                <select class="form-select" id="estado" name="estado" required>
                    <option value="1" @if($aire->estado) selected @endif>Encendido</option>
                    <option value="0" @if(!$aire->estado) selected @endif>Apagado</option>
                </select>
            </div>
            
            <div class="mb-3">
                <label for="temperatura" class="form-label" style="color: #5D7B6F;">Temperatura</label>
                <input type="number" class="form-control" id="temperatura" name="temperatura" value="{{ old('temperatura', $aire->temperatura) }}" required>
            </div>
            
            <div class="d-flex justify-content-end gap-2 mt-4">
                <a href="{{ route('aires.index') }}" class="btn btn-secondary" style="border-radius: 0.5rem;">
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