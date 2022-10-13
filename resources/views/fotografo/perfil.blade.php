@extends('layouts.app')

@section('conteudo')

    <div class="alert alert-light">
        <div class="">
        <img class="foto" src="{{Voyager::image($fotografo->avatar)}}" alt=""> <br>
        </div>
            {{--{{ $fotografo->name }} or {{$fotografo->nome_artistico}}<br>--}}

        <div class="border border-dark p-2 mb-2 border-opacity-50">{{ $fotografo->name }}</div>

        <div class="border border-dark p-2 mb-2 border-opacity-50"><a class="btn btn-dark btn-social mx-2" href="{{$fotografo->whatsapp}}" aria-label="Diana Petersen Facebook Profile"><i class="fab fa-whatsapp"></i></a>{{$fotografo->whatsapp}}</div>
        {{$fotografo->instagram}}



    <div class="section-heading text-uppercase">
        <a class="btn btn-dark btn-social mx-2" href="{{$fotografo->whatsapp}}" aria-label="Diana Petersen Facebook Profile"><i class="fab fa-whatsapp"></i></a>
    </div>

    <div class=" ">
         <a class="btn btn-dark btn-social mx-2" href="{{$fotografo->facebook}}" aria-label="Diana Petersen Facebook Profile"><i class="fab fa-facebook"></i></a>
    </div>
    <div class="">
        <a class="btn btn-dark btn-social mx-2" href="{{$fotografo->instagram}}" aria-label="Diana Petersen Facebook Profile"><i class="fab fa-instagram"></i></a>
    </div>
    <div class=" ">
        <a class="btn btn-dark btn-social mx-2" href="{{$fotografo->biografia}}" aria-label="Diana Petersen Facebook Profile"><i class="fab fa-user"></i></a>
    </div>
    <div class=" ">
        <a class="btn btn-dark btn-social mx-2" href="{{$fotografo->site}}" aria-label="Diana Petersen Facebook Profile"><i class="fab fa-weebly"></i></a>
    </div>
    <div class=" ">
        <a class="btn btn-dark btn-social mx-2" href="{{$fotografo->emial_profissional}}" aria-label="Diana Petersen Facebook Profile"><i class="fab fa-google"></i></a>
    </div>
    <div class="">
        <a class="btn btn-dark btn-social mx-2" href="{{$fotografo->cidade}}" aria-label="Diana Petersen Facebook Profile"><i class="fab fa-city"></i></a>
    </div>



    @forelse ($fotografo->eventos as $evento)
        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    <div class="col">
                        <div class="card shadow-sm">
                            <img class="bd-placeholder-img card-img-top" width="100%" height="225"
                                 src="{{Voyager::image($evento?->capa?->thumbnail('small', 'original'))}}"
                                 alt="foto-evento"/>

                            <div class="card-body">
                                <p class="card-text">
                                    <b> {{ $evento->titulo }} </b>
                                    {!! $evento->descricao !!}
                                    {!! $evento->dia_realizado !!} <br>
                                    R${!! $evento->valor!!}
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="{{route('eventos.show', [$evento->id])}}"
                                           class="btn btn-sm btn-outline-secondary">Visualizar</a>
                                    </div>
                                    <small class="text-muted">9 mins</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @empty
        <p>Não há eventos cadastrados para este usuário</p>
    @endforelse

    {{--SELECT eventos.titulo FROM eventos, users WHERE users.id = eventos.user_id--}}
@endsection
