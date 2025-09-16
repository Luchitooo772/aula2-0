<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { 
            background: linear-gradient(135deg, #EAE7D6 0%, #D7F9FA 100%);
            min-height: 100vh;
        }
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
    </style>
</head>
<body class="d-flex justify-content-center align-items-center">
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg rounded-3">
                    <div class="card-header bg-white text-center border-0 pt-4">
                        <h3 class="fw-bold" style="color: #5D7B6F;">Crear Cuenta</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                            <div class="mb-3">
                                <label for="name" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required autofocus style="border-radius: 0.75rem; border-color: #BDD4B8;">
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Correo Electrónico</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required style="border-radius: 0.75rem; border-color: #BDD4B8;">
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Contraseña</label>
                                <input type="password" class="form-control" id="password" name="password" required style="border-radius: 0.75rem; border-color: #BDD4B8;">
                            </div>

                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required style="border-radius: 0.75rem; border-color: #BDD4B8;">
                            </div>

                            <button type="submit" class="btn btn-primary w-100" style="background-color: #5D7B6F; border-color: #5D7B6F; border-radius: 0.75rem; transition: background-color 0.3s ease;">
                                Registrarse
                            </button>
                        </form>

                        <div class="text-center mt-3">
                            <a href="{{ route('login.form') }}" style="color: #A4C3A2;">¿Ya tienes cuenta? Inicia sesión</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>