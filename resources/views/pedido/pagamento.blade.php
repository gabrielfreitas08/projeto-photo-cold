@extends('layouts.app')

@section('conteudo')

    {{-- Informa os detalhes do pedido --}}
    <div class="alert alert-secondary text-center flex-wrap mt-lg-5 m-md-5">
        <h2>Veja as formas de pagar - Pedido {{$pedido->id}} </h2>
    </div>

    <section class="container ">
        <div class="d-flex ">
            <div class="flex-fill text-center d-flex flex-column">
                <div class="">
                <span class="fa-stack fa-2x">
                    <i class="fas fa-circle fa-stack-2x text-dark"></i>
                    <i class="fas fa-solid fa-stack-1x fa-sack-dollar fa-inverse"></i>
                </span>
                    <h4 class="my-3"> {{$pedido->getValorFormtadoReal() }}</h4>
                    <p class="text-muted">Valor que deve ser pago</p>
                </div>
                <div class="mt-3">
                <span class="fa-stack fa-2x">
                    <i class="fas fa-circle fa-stack-2x text-dark"></i>
                    <i class="fas fa-solid fa-stack-1x fa-user fa-inverse"></i>
                </span>
                    <h4 class="my-3"><a class="link-dark"
                                        href="{{route('fotografos.show', [$fotografo?->id])}}"> {{$fotografo?->user?->name}} </a>
                    </h4>
                    <p class="text-muted">Fotógrafo que receberá</p>
                </div>
            </div>
            <div class="info-pay flex-grow-1">
                <h3 class="text-center">Informações de Pagamentos</h3>
                {!! $fotografo->formas_pagamento !!}
            </div>
        </div>
    </section>

    {{-- Recebe o comprovante de pagamento  --}}

    <section class="bg-success bg-opacity-10 mt-3">
        <div class="container">
            <div class="text-center mb-5">
                <h3> Importe aqui o comprovante de pagamento do seu pedido</h3>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card bg-success bg-opacity-10 border border-0">
                        <div class="card-body">
                            <form action="{{route('pedido.informar_pagamento', ['id'=>$pedido->id])}}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf

                                <div class="row mb-3 d-flex justify-content-center">
                                    <div class="col-md-7">
                                        <div class="input-group flex-nowrap d-flex justify-content-center">
                                            <span class="input-group-text" id="addon-insta"><i class="fa-solid fa-file-upload"></i></span>
                                            <input type="file" class="form-control" name="comprovante" aria-describedby="addon-insta" >
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button class="btn btn-success" type="submit">
                                            Informar Pagamento
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="d-flex justify-content-end m-5">
        <a class="btn btn-dark" href="{{ route('pedidocliente') }}">Meus Pedidos</a>
    </div>

    {{-- <section class=" bg-success bg-opacity-10 ">
        <div class="">
            <div class="text-center mb-5">
                <h3> Importe aqui o comprovante de pagamento do seu pedido</h3>
            </div>
            <div class="d-flex justify-content-between">
                <form action="{{route('pedido.informar_pagamento', ['id'=>$pedido->id])}}" method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3 d-flex justify-content-center">
                        <div class="">
                            <div class="input-group flex-nowrap d-flex justify-content-center">
                                <span class="input-group-text" id="arquivo"><i class="fa-solid fa-file-upload"></i></span>
                                <input placeholder="file" type="file" name="comprovante" aria-describedby="arquivo">
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <button class="btn btn-success" type="submit">
                            Informar Pagamento
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section> --}}

@endsection
