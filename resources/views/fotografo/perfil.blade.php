@extends('layouts.app')

@section('conteudo')

    <section class="page-section bg-light" >

        <div class="row">
            <div class="col-lg-4">
                <div class="team-member">
                    {{--<img class="mx-auto rounded-circle" src="{{asset('assets/img/team/1.jpg')}}" alt="..." />--}}
                    <img class="foto mx-auto rounded-circle " src="{{Voyager::image($fotografos?->user?->avatar)}}"
                         alt="fotografo">
                    <h4>{{ $fotografos->user->name }}</h4>
                    <p class="text-muted">{{$fotografos->cidade->nome}} <br>
                        {{$fotografos->cidade?->estado?->nome}}</p>
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
            <div class="p-lg-5 col-lg-7 ">
                {{ $fotografos->biografia }}

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

    <section class="p-3 mb-2 bg-dark text-white">
        <h3 class="p-lg-5 text-center h3">
            <b>Eventos</b>
        </h3>
        <div class="album bg-dark ">
            <div class="container">
                    @forelse ($fotografos->user?->eventos as $evento)
                        <div class="album py-5 bg-light d-flex flex-wrap">
                            <div class="container ">
                                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                                    <div class="col">
                                        <div class="card shadow-sm">
                                            <img class="bd-placeholder-img card-img-top" width="100%" height="225"
                                                 src="{{Voyager::image($evento?->capa?->thumbnail('small', 'original'))}}"
                                                 alt="foto-evento"/>

                                            <div class="card-body">
                                                <p class="card-text text-dark">
                                                    <b> {{ $evento->titulo }} </b>
                                                </p>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="btn-group">
                                                        <a href="{{route('eventos.show', [$evento->id])}}"
                                                           class="btn btn-sm btn-outline-secondary">Visualizar</a>
                                                    </div>
                                                    <small class="text-muted text-dark">{!! $evento->dia_realizado !!}</small>
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

@endsection
