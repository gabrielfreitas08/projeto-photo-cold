@extends('layouts.app')

@section('conteudo')

    <section class="page-section bg-light" >

        <div class="row">
            <div class="col-lg-4">
                <div class="team-member">
                    {{--<img class="mx-auto rounded-circle" src="{{asset('assets/img/team/1.jpg')}}" alt="..." />--}}
                    <img class="foto mx-auto rounded-circle " src="{{Voyager::image($fotografo?->user?->avatar)}}"
                         alt="fotografo">
                    <h4>{{ $fotografo?->user?->name }}</h4>
                    <p class="text-muted">{{$fotografo?->cidade?->nome}} <br>
                        {{$fotografo?->cidade?->estado?->nome}}</p>
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
                <a class="p-5" href="{{route('fotografos.trabalho',['id'=>$fotografo->id])}}">
                <button type="button" class="btn btn-dark btn-lg rounded-pill">Meus Trabalhos</button>
                </a>
            </div>
            <div class="p-lg-5 col-lg-7 ">
                {!! $fotografo?->biografia !!}


    </section>


    <section class="p-3 mb-2 bg-dark text-white">
        <h3 class="p-lg-5 text-center h3">
            <b>Eventos</b>
        </h3>
        <div class="album py-5 bg-light">
            <div class="container">

                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    @forelse ($fotografo->user?->eventos as $evento)
                        <div class="col">
                            <div class="card shadow-sm">
                                <img class="bd-placeholder-img card-img-top" width="100%" height="225"
                                     src="{{Voyager::image($evento?->capa?->thumbnail('small', 'original'))}}" alt="foto-evento"/>

                                <div class="card-body">
                                    <p class="card-text">
                                        <b> {{ $evento->titulo }} </b>
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <a href="{{route('eventos.show', [$evento->id])}}" class="btn btn-sm btn-outline-secondary">Visualizar</a>
                                        </div>
                                        <small class="text-muted">{{$evento->cidade?->nome}} - {{ $evento->dia_realizado->format('d/m/Y') }}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p>Não há eventos realizados deste usuario</p>
                    @endforelse
                </div>
            </div>
        </div>
    </section>

@endsection
