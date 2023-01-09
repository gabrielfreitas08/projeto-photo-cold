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

    <section class="d-flex justify-content-center flex-wrap ">
        @forelse ($eventos?->fotos as $foto)
            <div class="evento-card m-2" type="button" data-bs-toggle="modal"
                 data-bs-target="#fotoModal-{{ $foto->id }}">

                <img src="{{ Voyager::image($foto->thumbnail('medium', 'original')) }}" class="card-img-top"
                     alt="foto evento">

                <a data-id="{{ $foto->id }}"
                   data-imagem="{{ Voyager::image($foto->thumbnail('small', 'original')) }}"
                   data-valor="{{ $eventos->valor }}" data-evento="{{ $eventos->titulo }}"
                   data-fotografo="{{ $eventos->user?->name }}" onclick="adicionarItemNoCarrinho()"
                   class="btn btn-dark evento-btn-add"><i class="fa-solid fa-cart-plus"></i> Selecionar</a>
            </div>
            <div class="modal fade" id="fotoModal-{{ $foto->id }}" tabindex="-1"
                 aria-labelledby="fotoModal-{{ $foto->id }}Label" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="fotoModal-{{ $foto->id }}Label">Foto #{{ $foto->id }}</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <img src="{{ Voyager::image($foto->thumbnail('medium', 'original')) }}" class="img-fluid"
                                 alt=" foto do evento">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <p>Não há fotos cadastradas</p>
        @endforelse
    </section>

@endsection
