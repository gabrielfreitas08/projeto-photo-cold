@extends('layouts.app')

@section('conteudo')

    {{--
        <div class="accordion" id="accordionPanelsStayOpenExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                            aria-controls="panelsStayOpen-collapseOne">
                        <b> {{ $eventos->titulo }} </b>
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show"
                     aria-labelledby="panelsStayOpen-headingOne">
                    <div class="accordion-body">
                        Descrição: {!! $eventos->descricao !!} <br>
                        Valor: R${!! $eventos->valor !!} <br>
                        {!! $eventos->dia_realizado !!}
                    </div>
                </div>
            </div>
    --}}


    <section class="page-section bg-light">

        <div class="row">
            <div class="col-lg-4">
                <div class="team-member">
                    <img class="foto mx-auto rounded-circle "
                         src="{{Voyager::image($eventos?->capa?->thumbnail('small', 'original'))}}"
                         alt="evento">
                </div>
            </div>
            <div class="p-lg-5 col-lg-7 ">
                <b><h3 class="text-center fs-2">{{ $eventos?->titulo }}</h3></b>
                {!! $eventos?->descricao !!}
                <div class="flex-wrap justify-content-between bg-secondary link-light">
                    {{ $eventos->user?->name }}
                    {{ $eventos->cidade?->nome }}
                </div>
                <p class=""> {{ $eventos?->dia_realizado }} </p>
        </div>

    </section>



    <section class="d-flex justify-content-evenly flex-wrap">
        @forelse ($eventos->fotos as $foto)
            <div class="card " style="width: 18rem;">
                <img src="{{ Voyager::image($foto->thumbnail('medium', 'original')) }}" class="card-img-top"
                     alt="...">
                <div class="card-body">
                    <h5 class="card-title"></h5>
                    <p class="card-text">{{ $eventos->evento_id }}</p>
                    <a data-id="{{$foto->id}}}" data-imagem="{{Voyager::image($foto->thumbnail('small', 'original'))}}"
                       data-valor="{{$eventos->valor}}"
                       onclick="adicionarItemNoCarrinho()" class="btn btn-dark">Adicionar ao carrinho</a>
                </div>
            </div>
        @empty
            <p>Não há fotos cadastradas</p>
        @endforelse
    </section>

@endsection
