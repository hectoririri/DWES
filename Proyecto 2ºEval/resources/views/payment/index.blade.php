@extends('layouts.plantilla')
@section('title', 'Payment')
@section('cuerpo')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Pago con Paypal</div>
                <div class="card-body text-center">
                    <h2>Total a pagar: ${{ number_format($amount ?? 100, 2) }}</h2>
                    <a href="{{ route('payment') }}" class="btn btn-primary">
                        Pagar con PayPal
                        <i class="fab fa-paypal ms-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection