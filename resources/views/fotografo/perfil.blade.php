@extends('layouts.app')

@section('conteudo')

    <section class="page-section bg-light" >

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
            <div class="p-lg-5 col-lg-7 ">
                {!! $fotografo->biografia !!}
                O que é Lorem Ipsum?
                Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI, quando um impressor desconhecido pegou uma bandeja de tipos e os embaralhou para fazer um livro de modelos de tipos. Lorem Ipsum sobreviveu não só a cinco séculos, como também ao salto para a editoração eletrônica, permanecendo essencialmente inalterado. Se popularizou na década de 60, quando a Letraset lançou decalques contendo passagens de Lorem Ipsum, e mais recentemente quando passou a ser integrado a softwares de editoração eletrônica como Aldus PageMaker.

                Porque nós o usamos?
                É um fato conhecido de todos que um leitor se distrairá com o conteúdo de texto legível de uma página quando estiver examinando sua diagramação. A vantagem de usar Lorem Ipsum é que ele tem uma distribuição normal de letras, ao contrário de "Conteúdo aqui, conteúdo aqui", fazendo com que ele tenha uma aparência similar a de um texto legível. Muitos softwares de publicação e editores de páginas na internet agora usam Lorem Ipsum como texto-modelo padrão, e uma rápida busca por 'lorem ipsum' mostra vários websites ainda em sua fase de construção. Várias versões novas surgiram ao longo dos anos, eventualmente por acidente, e às vezes de propósito (injetando humor, e coisas do gênero).


                De onde ele vem?
                Ao contrário do que se acredita, Lorem Ipsum não é simplesmente um texto randômico. Com mais de 2000 anos, suas raízes podem ser encontradas em uma obra de literatura latina clássica datada de 45 AC. Richard McClintock, um professor de latim do Hampden-Sydney College na Virginia, pesquisou uma das mais obscuras palavras em latim, consectetur, oriunda de uma passagem de Lorem Ipsum, e, procurando por entre citações da palavra na literatura clássica, descobriu a sua indubitável origem. Lorem Ipsum vem das seções 1.10.32 e 1.10.33 do "de Finibus Bonorum et Malorum" (Os Extremos do Bem e do Mal), de Cícero, escrito em 45 AC. Este livro é um tratado de teoria da ética muito popular na época da Renascença. A primeira linha de Lorem Ipsum, "Lorem Ipsum dolor sit amet..." vem de uma linha na seção 1.10.32.
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
                    @forelse ($fotografo->eventos as $evento)
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
