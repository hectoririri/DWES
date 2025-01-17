@php \App\Models\SesionUsuario::getInstance()->onlyLogged() @endphp
@extends('layout/plantilla')
@section('title', 'Inicio de sesión')
@section('cuerpo')
    <h1>Bienvenido a la página home</h1>
@endsection