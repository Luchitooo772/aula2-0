@extends('layouts.app')

@section('title', 'Editar Mueble')

@section('content')
<div class="container my-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold" style="color: #5D7B6F;">Editar Mueble</h1>
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
        <form action="{{ route('muebles.update', $mueble->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label for="aula_id" class="form-label" style="color: #5D7B6F;">Aula</label>
                <select class="form-select" id="aula_id" name="aula_id" required>
                    @foreach($aulas as $aula)
                        <option value="{{ $aula->id }}" @if($mueble->aula_id == $aula->id) selected @endif>{{ $aula->nombre }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="mb-3">
                <label for="tipo" class="form-label" style="color: #5D7B6F;">Tipo</label>
                <input type="text" class="form-control" id="tipo" name="tipo" value="{{ old('tipo', $mueble->tipo) }}" required>
            </div>
            
            <div class="mb-3">
                <label for="cantidad" class="form-label" style="color: #5D7B6F;">Cantidad</label>
                <input type="number" class="form-control" id="cantidad" name="cantidad" value="{{ old('cantidad', $mueble->cantidad) }}" required>
            </div>
            
            <div class="d-flex justify-content-end gap-2 mt-4">
                <a href="{{ route('muebles.index') }}" class="btn btn-secondary" style="border-radius: 0.5rem;">
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