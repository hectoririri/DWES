@extends('layouts.plantilla')
@section('title', 'Página de inicio')
@section('cuerpo')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h3>¡Te has logeado correctamente!</h3></div>

                <div class="card-body">
                    <p class="welcome-text" style="display: none;">Bienvenido a la pantalla de inicio, <b>{{auth()->user()->name}}</b></p>
                    <p class="role-text" style="display: none;">Actualmente, tienes permisos de 
                        @if (auth()->user()->isAdmin())
                            <b>administrador</b>
                        @else
                            <b>operario</b>
                        @endif
                    </p>
                    <div id="app">
                        <div class="button-container mt-4">
                            <button class="btn btn-primary me-2" @click="showAlert">Show Alert</button>
                            <button class="btn btn-success me-2" @click="counter++">Count: @{{ counter }}</button>
                            <button class="btn btn-info me-2" @click="toggleText">Toggle Text</button>
                            <button class="btn btn-warning me-2" @click="getCurrentTime">Show Time</button>
                        </div>
                        
                        <div class="mt-3" v-if="showMessage">
                            <p class="alert alert-info">@{{ message }}</p>
                        </div>
                    </div>

                    <!-- Add Vue CDN -->
                    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>

                    <script>
                        const { createApp } = Vue
                        
                        createApp({
                            data() {
                                return {
                                    counter: 0,
                                    message: '',
                                    showMessage: false
                                }
                            },
                            methods: {
                                showAlert() {
                                    this.message = 'Hello ' + '{{ auth()->user()->name }}' + '!';
                                    this.showMessage = true;
                                },
                                toggleText() {
                                    this.message = this.showMessage ? '' : 'Text toggled!';
                                    this.showMessage = !this.showMessage;
                                },
                                getCurrentTime() {
                                    this.message = 'Current time: ' + new Date().toLocaleTimeString();
                                    this.showMessage = true;
                                }
                            }
                        }).mount('#app')
                    </script>
                </div>

                {{-- Animacion texto javascript usando jquery --}}
                <script>
                    window.addEventListener('load', function() {
                        $('.welcome-text').fadeIn(1500, function() {
                            $('.role-text').slideDown(1000);
                        });
                    });
                </script>
            </div>
        </div>
    </div>
</div>
@endsection
