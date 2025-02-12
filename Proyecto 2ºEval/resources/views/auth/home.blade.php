@extends('layouts.plantilla')
@section('title', 'Página de inicio')
@section('cuerpo')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h3>¡Te has logeado correctamente!</h3></div>

                <div class="card-body">
                    <p>Bienvenido a la pantalla de inicio, <b>{{auth()->user()->name}}</b></p>
                    <p>Actualmente, tienes permisos de 
                        @if (auth()->user()->isAdmin())
                            <b>administrador</b>
                        @else
                            <b>operario</b>
                        @endif
                        </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
