@extends('layout/plantilla')
@section('title', 'Listado de Tareas')
@section('cuerpo')
<h1>Lista de Tareas</h1>

@if (!empty($_GET['error']))
    <div class="text-center my-4">
        <h3 class="alert alert-info d-inline-block">La tarea no existe</h3>
    </div>
@endif

<table class="table table-striped table-bordered">
    <thead class="thead-dark">
        <tr class="text-center">
            <th>Descripción</th>
            <th>Operario</th>
            <th>Estado</th>
            <th>Anotaciones Anteriores</th>
            <th>Anotaciones Posteriores</th>
            <th>Provincia</th>
            <th>Fecha de Creación</th>
            <th>Fecha de Realización</th>
            <th>Detalles</th>
            @if (\App\Models\SesionUsuario::getInstance()->isAdmin())
                <th>Modificar</th>
                <th>Eliminar</th>
            @else
                <th>Completar</th>
            @endif
        </tr>
    </thead>
    <tbody>
        @foreach ($tareas as $tarea)
            <tr class="text-center">
                <td>{{ $tarea['descripcion'] }}</td>
                <td>{{ $tarea['operario'] }}</td>
                <td>{{ $tarea['estado'] }}</td>
                <td>{{ $tarea['anotaciones_anteriores'] }}</td>
                <td>{{ $tarea['anotaciones_posteriores'] }}</td>
                <td>{{ $tarea['provincia'] }}</td>
                <td>{{ $tarea['fecha_creacion'] }}</td>
                <td>{{ $tarea['fecha_realizacion'] }}</td>
                <td>
                    <a href="{!! miurl("mostrar/tarea/{$tarea['id']}") !!}" class="btn btn-outline-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-square" viewBox="0 0 16 16">
                            <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
                            <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0"/>
                        </svg>
                    </a>
                </td>
                @if (\App\Models\SesionUsuario::getInstance()->isAdmin())
                    <td>
                        <a href="{!! miurl("modificar/tarea/{$tarea['id']}") !!}" class="btn btn-outline-secondary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                            </svg>
                        </a>
                    </td>
                    <td>
                        <a href="{!! miurl("borrar/tarea/{$tarea['id']}") !!}" class="btn btn-outline-danger">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                            </svg>
                        </a>
                    </td>
                @endif
                @if (!\App\Models\SesionUsuario::getInstance()->isAdmin() && ($tarea['estado'] == 'P' || $tarea['estado'] == 'B'))
                <td>
                    <a href="{!! miurl("completar/tarea/{$tarea['id']}") !!}" class="btn btn-outline-success">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard-check" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0"/>
                            <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1z"/>
                            <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0z"/>
                        </svg>
                    </a>
                </td>
                @endif
            </tr>
        @endforeach
    </tbody>
</table>

<p>{{$paginaActual}}/{{$totalPaginas}}</p>

<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        <li class="page-item {{ $paginaActual == 1 ? 'disabled' : '' }}">
            <a class="page-link" href="?pagina={{ $paginaActual - 1 }}">Anterior</a>
        </li>
        @for ($i = 1; $i <= $totalPaginas; $i++)
            <li class="page-item {{ $paginaActual == $i ? 'active' : '' }}">
                <a class="page-link" href="?pagina={{ $i }}">{{ $i }}</a>
            </li>
        @endfor
        <li class="page-item {{ $paginaActual == $totalPaginas ? 'disabled' : '' }}">
            <a class="page-link" href="?pagina={{ $paginaActual + 1 }}">Siguiente</a>
        </li>
    </ul>
</nav>

<a href="{!! miurl('mostrar/tareas/pendientes') !!}" class="btn btn-outline-secondary d-inline-flex align-items-center">Listar tareas pendientes</a>
<a href="{!! miurl('mostrar/tareas') !!}" class="btn btn-outline-secondary d-inline-flex align-items-center">Mostrar por defecto</a>

@endsection
