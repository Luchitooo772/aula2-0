<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>@yield('title','Aula Inteligente')</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body { background-color:#f4f6f9; }
        .navbar-brand { font-weight:700; letter-spacing:.3px; }
        .card { border:0; border-radius:1rem; box-shadow: 0 10px 25px rgba(0,0,0,.05); }
        footer { background:#0d6efd; color:#fff; }
        .table thead th { white-space:nowrap; }
        .table thead th, .table td { vertical-align: middle; }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">Aula Inteligente</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuPrincipal">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div id="menuPrincipal" class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto align-items-lg-center">
                    @auth
                        <li class="nav-item"><a class="nav-link" href="{{ route('aires.index') }}">Aires</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('aulas.index') }}">Aulas</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('cortinas.index') }}">Cortinas</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('docentes.index') }}">Docentes</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('focos.index') }}">Focos</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('materias.index') }}">Materias</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('muebles.index') }}">Muebles</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('reservas.index') }}">Reservas</a></li>
                        <li class="nav-item">
                            <span class="navbar-text me-2 d-none d-lg-inline">Hola, {{ auth()->user()->name }}</span>
                        </li>
                        <li class="nav-item">
                            <form method="POST" action="{{ route('logout') }}" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-light btn-sm">Cerrar sesión</button>
                            </form>
                        </li>
                    @endauth

                    @guest
                        <li class="nav-item"><a class="nav-link" href="{{ route('login.form') }}">Iniciar sesión</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('register.form') }}">Registrarse</a></li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="container my-4">
        {{-- Alerts globales --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Ups…</strong> Revisa los datos:
                <ul class="mb-0">
                    @foreach ($errors->all() as $e)
                        <li>{{ $e }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @yield('content')
    </main>

    <footer class="text-center py-3 mt-5">
        &copy; {{ date('Y') }} Aula Inteligente — Todos los derechos reservados
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
