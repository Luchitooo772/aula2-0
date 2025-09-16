@extends('layouts.app')

@section('title', 'Bienvenido')

@section('content')
<div class="d-flex flex-column justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="card p-5 shadow-lg welcome-card" style="width: 100%; max-width: 600px; text-align: center;">
        <h1 class="display-4 fw-bold mb-3" style="color: #5D7B6F; animation: fadeIn 2s;">
            ¡Hola, {{ auth()->user()->name }}!
        </h1>
        <p class="lead mb-4" style="color: #495057; animation: slideIn 2s;">
            Bienvenido a tu panel de control de Aula Inteligente.
        </p>
        <hr class="my-4" style="border-color: #BDD4B8; animation: expand 2s;">
        <p style="animation: fadeIn 2.5s;">
            Desde aquí puedes gestionar todos los dispositivos de tus aulas.
        </p>
        <a href="{{ route('aulas.index') }}" class="btn mt-3" style="background-color: #A4C3A2; border-color: #A4C3A2; color: #fff; border-radius: 0.75rem; animation: bounceIn 2.5s;">
            Ir al Panel de Aulas
        </a>
    </div>
</div>

<style>
    /* Animación de entrada para los elementos */
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    @keyframes slideIn {
        from { transform: translateY(20px); opacity: 0; }
        to { transform: translateY(0); opacity: 1; }
    }

    @keyframes expand {
        from { width: 0; }
        to { width: 100%; }
    }
    
    @keyframes bounceIn {
        0% { transform: scale(0.9); opacity: 0; }
        60% { transform: scale(1.1); opacity: 1; }
        100% { transform: scale(1); }
    }
</style>
@endsection