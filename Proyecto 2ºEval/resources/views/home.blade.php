@php \App\Models\SesionUsuario::getInstance()->onlyLogged() @endphp
@extends('layout/plantilla')
@section('title', 'Inicio de sesión')
@section('cuerpo')
    <h1>Bienvenido a la página home</h1>
    <br> <br>
    <h3>Has iniciado sesión con el usuario {{$_SESSION['usuario']}}</h3>
    <br>
    @if ($_SESSION['admin'])
        <h3>Tienes permisos de administrador</h3>
    @else
        <h3>Tienes permisos de operario</h3>
    @endif
@endsection