@extends('layouts.app')

@section('conteudo')

    <div class="alert alert-secondary text-center flex-wrap mt-lg-5 m-md-5">
        <h2>Veja as formas de pagar - Pedido {{$pedido->id}} </h2>
    </div>

    <section class="container">

        <div class="row">

            {!! $fotografo->formas_pagamento !!}

        </div>

    </section>

@endsection
