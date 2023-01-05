@extends('layouts.app')

@section('conteudo')

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

    <section class=" bg-success bg-opacity-10 ">
        <div class="text-center mb-5">
            <h3> Importe aqui o comprovante do pagamento do pedido</h3>
        </div>
        <div class="d-flex justify-content-between">
            <form action="{{route('pedido.informar_pagamento', ['id'=>$pedido->id])}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <div class="input-group flex-nowrap d-flex justify-content-center">
                        <span class="input-group-text "><i class="fa-solid fa-file-upload"></i></span>
                        <div class="col-md-6 ml">
                            <input placeholder="file" type="file" name="comprovante">
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
    </section>



    {{-- <span>
                <a class="btn btn-dark" href="{{route('fotografos.show', [$fotografo?->id])}}">{{$fotografo?->user?->name}}</a>
          </span> --}}

@endsection
