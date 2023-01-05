@extends('layouts.app')

@section('conteudo')


    <section class="page-section bg-light ">

        <div class="row">
            <div class="col-lg-4">
                <div class="mx-5 mt-lg-5 ">
                    <img class="rounded"
                         src="{{Voyager::image($eventos?->capa?->thumbnail('small', 'original'))}}"
                         alt="evento">
                </div>
            </div>
            <div class="p-lg-5 col-lg-7 ">
                <b><h3 class="text-center fs-2">{{ $eventos?->titulo }}</h3></b>
                {!! $eventos?->descricao !!}
                <div class="d-flex justify-content-between">
                    <p> {{ $eventos?->user?->name }} </p>
                    <p> {{ $eventos?->cidade?->nome }} </p>
                </div>
                <p class=""> {{ $eventos?->dia_realizado->format('d/m/Y') }} </p>
            </div>
        </div>

    </section>



    <section class="d-flex justify-content-evenly flex-wrap ">
        @forelse ($eventos?->fotos as $foto)
            <div class="card" style="width: 18rem;">
                <img src="{{ Voyager::image($foto->thumbnail('medium', 'original')) }}" class="card-img-top"
                     alt="..." >
                <div class="card-body">
                    <h5 class="card-title"></h5>
                    <p class="card-text">{{ $eventos->evento_id }}</p>
                    <a data-id="{{$foto->id}}" data-imagem="{{Voyager::image($foto->thumbnail('small', 'original'))}}"
                       data-valor="{{$eventos->valor}}" data-evento="{{$eventos->titulo}}" data-fotografo="{{$eventos->user?->name}}"
                       onclick="adicionarItemNoCarrinho()" class="btn btn-dark">Adicionar ao carrinho</a>
                </div>
                {{--
                <i class="fa-solid fa-square-check"></i> para adicionar ao carrinho
                <i class="fa-solid fa-square-xmark"></i> alternativa para retirar do carrinho
                --}}
            </div>
        @empty
            <p>Não há fotos cadastradas</p>
        @endforelse
    </section>

@endsection
