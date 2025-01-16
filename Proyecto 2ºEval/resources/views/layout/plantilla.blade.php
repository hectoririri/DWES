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
    <main class="container mt-3">
        <div class="row">
            <div class="col-md-2">
                @if (!isset($mostrarMenu) || $mostrarMenu)
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{!! miurl('home') !!}">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{!! miurl('mostrar/tareas') !!}">Mostrar Tareas</a>
                                </li>
                                @if (\App\Models\SesionUsuario::getInstance()->isAdmin())
                                    <li class="nav-item">
                                        <a class="nav-link" href="{!! miurl('formulario/alta/tarea') !!}">Añadir Tarea</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{!! miurl('mostrar/usuarios') !!}">Mostrar usuarios</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{!! miurl('formulario/alta/usuario') !!}">Añadir usuario</a>
                                    </li>
                                @endif
                                
                            </ul>
                        </div>
                    </nav>
                @endif
            </div>
            <div class="col-md-10">
                @if (!isset($mostrarMenu) || $mostrarMenu)
                <div class="d-flex justify-content-end">
                    <a href="{!! miurl('loggout') !!}">Cerrar sesión</a>
                </div>
                @endif
                @yield('cuerpo')
            </div>
        </div>
    </main>
    <footer class="text-center mt-4">
        @yield('footer')
    </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>