@extends('layouts.app')

@section('conteudo')


    <section class="page-section bg-light" id="team">

        <div class="row">
            <div class="col-lg-4">
                <div class="team-member">
                    {{--<img class="mx-auto rounded-circle" src="{{asset('assets/img/team/1.jpg')}}" alt="..." />--}}
                    <img class="foto mx-auto rounded-circle " src="{{Voyager::image($fotografo->avatar)}}"
                         alt="fotografo">
                    <h4>{{ $fotografo->name }}</h4>
                    <p class="text-muted">{{$fotografo->cidade}}</p>
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Parveen Anand Twitter Profile"><i
                            class="fab fa-whatsapp"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Parveen Anand Facebook Profile"><i
                            class="fab fa-instagram"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Parveen Anand LinkedIn Profile"><i
                            class="fab fa-facebook"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Parveen Anand LinkedIn Profile"><i
                            class="fa-solid fa-envelope"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Parveen Anand LinkedIn Profile"><i
                            class="fa-solid fa-globe"></i></a>
                </div>
            </div>
            <div class="p-lg-5">
                {!! $fotografo->biografia !!}
            </div>

    </section>



    {{--<div class="alert alert-light">
        <div class="">
        <img class="foto" src="{{Voyager::image($fotografo->avatar)}}" alt=""> <br>
        </div>
            --}}{{--{{ $fotografo->name }} or {{$fotografo->nome_artistico}}<br>--}}{{--

        <div class="border border-dark p-2 mb-2 border-opacity-50">{{ $fotografo->name }}</div>

        <div class="border border-dark p-2 mb-2 border-opacity-50"><a class="btn btn-dark btn-social mx-2" href="{{$fotografo->whatsapp}}" aria-label="Diana Petersen Facebook Profile"><i class="fab fa-whatsapp"></i></a>{{$fotografo->whatsapp}}</div>
        {{$fotografo->instagram}}--}}



    {{--
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
--}}

    <section>
        <h4>
            Eventos
        </h4>
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
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <a href="{{route('eventos.show', [$evento->id])}}"
                                               class="btn btn-sm btn-outline-secondary">Visualizar</a>
                                        </div>
                                        <small class="text-muted">{!! $evento->dia_realizado !!}</small>
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
    </section>

    {{--SELECT eventos.titulo FROM eventos, users WHERE users.id = eventos.user_id--}}
@endsection
