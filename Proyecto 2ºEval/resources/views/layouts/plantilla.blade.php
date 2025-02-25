<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <style>
        span {
            color: red;
        }
    </style>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <header class="text-center my-4">
        <h1>Albañilería Bunglebuild S.L. </h1>
    </header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{!! route('home') !!}">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="tareasDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Tareas
                    </a>
                    <div class="dropdown-menu" aria-labelledby="tareasDropdown">
                        @if(Auth::user()->isAdmin())
                        <a class="dropdown-item" href="{!! route('tareas.create') !!}">Añadir Tarea</a>
                        @endif
                        <a class="dropdown-item" href="{!! route('tareas.index') !!}">Mostrar Tareas</a>
                    </div>
                </li>
                @if(Auth::user()->isAdmin())
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="usuariosDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Usuarios
                    </a>
                    <div class="dropdown-menu" aria-labelledby="usuariosDropdown">
                        <a class="dropdown-item" href="{!! route('usuarios.create') !!}">Añadir usuarios</a>
                        <a class="dropdown-item" href="{!! route('usuarios.index') !!}">Mostrar usuarios</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="clientesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Clientes
                    </a>
                    <div class="dropdown-menu" aria-labelledby="clientesDropdown">
                        <a class="dropdown-item" href="{!! route('clientes.create') !!}">Añadir clientes</a>
                        <a class="dropdown-item" href="{!! route('clientes.index') !!}">Mostrar clientes</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="cuotasDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Cuotas
                    </a>
                    <div class="dropdown-menu" aria-labelledby="cuotasDropdown">
                        <a class="dropdown-item" href="{!! route('cuotas.create') !!}">Añadir cuotas</a>
                        <a class="dropdown-item" href="{!! route('cuotas.index') !!}">Mostrar cuotas</a>
                    </div>
                </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link" href="{!! route('usuarios.show', ['usuario' => Auth::user()]) !!}">Mi perfil 👤</a>
                </li>
            </ul>
        </div>
    </nav>
    <main class="container-fluid mt-3">
        <div class="d-flex justify-content-end">
            <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                {{ __('Cerrar Sesión') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
        @yield('cuerpo')
    </main>
    <footer class="text-center mt-4">
        @yield('footer')
    </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
<style>
    body {
        background-color: #f8f9fa;
    }
    header {
        background-color: #343a40;
        color: #ffffff;
        padding: 20px 0;
    }
    footer {
        background-color: #343a40;
        color: #ffffff;
        padding: 10px 0;
    }
    .navbar-light .navbar-nav .nav-link {
        color: #343a40;
    }
    .navbar-light .navbar-nav .nav-link:hover {
        color: #007bff;
    }
    .container-fluid {
        background-color: #ffffff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
</style>
