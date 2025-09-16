<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>@yield('title','Gestion de aulas')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        body { 
            background: linear-gradient(135deg, #EAE7D6 0%, #D7F9FA 100%); /* Colores de tu paleta */
            min-height: 100vh;
            color: #495057;
        }
        .navbar-brand { font-weight:700; letter-spacing:.3px; }
        .card { 
            border: 0; 
            border-radius: 1.25rem; 
            box-shadow: 0 15px 35px rgba(0,0,0,.1); 
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 45px rgba(0,0,0,.15);
        }
        footer { 
            background: #557065ff; /* Color de tu paleta */
            color: #fff; 
            padding: 1.5rem 0;
            margin-top: auto;
        }
        .table thead th { 
            white-space: nowrap;
            background-color: #f8f9fa;
        }
        .table thead th, .table td { vertical-align: middle; }
        .table-hover tbody tr:hover {
            background-color: #f1f3f5;
        }

        /* Estilos del sidebar */
        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #f8f9fa; /* Color de tu paleta, más claro */
            padding-top: 5rem;
            box-shadow: 2px 0 5px rgba(0,0,0,.1);
            transition: all 0.3s ease-in-out;
            z-index: 1000;
        }
        .sidebar .nav-link {
            transition: all 0.3s;
            border-radius: 0.75rem;
            margin: 0.25rem 0;
            padding: 0.75rem 1.5rem;
            color: #495057;
        }
        .sidebar .nav-link:hover {
            background-color: #e9ecef;
            color: #495057;
            transform: translateX(5px);
        }
        .content {
            margin-left: 250px;
            padding: 2rem;
            transition: all 0.3s ease-in-out;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
    </style>
</head>
<body>

    @auth
        <div class="sidebar d-flex flex-column align-items-center">
            <a href="{{ route('home') }}" class="py-3 text-center">
                <span class="fs-4 fw-bold" style="color: #508058ff;">Gestion de aulas</span>
            </a>
            <ul class="nav flex-column w-100 mt-4">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('aulas.index') }}">
                        <i class="fas fa-chalkboard me-2" style="color: #5D7B6F;"></i><span style="color: #495057;">Aulas</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('docentes.index') }}">
                        <i class="fas fa-user-tie me-2" style="color: #5D7B6F;"></i><span style="color: #495057;">Docentes</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('materias.index') }}">
                        <i class="fas fa-book me-2" style="color: #5D7B6F;"></i><span style="color: #495057;">Materias</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('reservas.index') }}">
                        <i class="fas fa-calendar-alt me-2" style="color: #5D7B6F;"></i><span style="color: #495057;">Reservas</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('focos.index') }}">
                        <i class="fas fa-lightbulb me-2" style="color: #5D7B6F;"></i><span style="color: #495057;">Focos</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('aires.index') }}">
                        <i class="fas fa-fan me-2" style="color: #5D7B6F;"></i><span style="color: #495057;">Aires</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('muebles.index') }}">
                        <i class="fas fa-couch me-2" style="color: #5D7B6F;"></i><span style="color: #495057;">Muebles</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('cortinas.index') }}">
                        <i class="fas fa-blinds me-2" style="color: #5D7B6F;"></i><span style="color: #495057;">Cortinas</span>
                    </a>
                </li>
            </ul>
        </div>
    @endauth

    <main class="content">
        @auth
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent">
                <div class="container-fluid">
                    <a class="navbar-brand d-lg-none" href="{{ route('home') }}">Aula Inteligente</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuPrincipal">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="menuPrincipal">
                        <ul class="navbar-nav ms-auto align-items-lg-center">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-user-circle"></i> {{ auth()->user()->name }}
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}" class="dropdown-item">
                                            @csrf
                                            <button type="submit" class="btn btn-link text-decoration-none text-dark p-0">
                                                <i class="fas fa-sign-out-alt"></i> Cerrar sesión
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        @endauth
        <div class="container my-4">
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
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>