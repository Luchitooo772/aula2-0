@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center">Bienvenido al Aula Inteligente</h1>
    <p class="text-center">Has iniciado sesión correctamente.</p>

    <div class="row mt-4">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header">Tus Cursos</div>
                <div class="card-body">
                    <p>Aquí aparecerán los cursos del alumno/profesor.</p>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header">Actividades</div>
                <div class="card-body">
                    <p>Aquí se mostrarán las tareas y actividades pendientes.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
