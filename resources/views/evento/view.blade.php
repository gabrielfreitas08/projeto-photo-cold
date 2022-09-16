@extends('layouts.app')

@section('conteudo')


<div class="accordion" id="accordionPanelsStayOpenExample">
    <div class="accordion-item">
        <h2 class="accordion-header" id="panelsStayOpen-headingOne">
            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                    data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                    aria-controls="panelsStayOpen-collapseOne">
                <b> {{ $evento->titulo }} </b>
            </button>
        </h2>
        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show"
             aria-labelledby="panelsStayOpen-headingOne">
            <div class="accordion-body">
                Descrição: {!! $evento->descricao !!}
                Valor: R${!! $evento->valor !!} <br>
                {!! $evento->dia_realizado !!}
            </div>
        </div>
    </div>
    {{--
<div class="px-5 p-2">
        <b> {{ $evento->titulo }} </b>
        {!! $evento->descricao !!}
        {!! $evento->dia_realizado !!}
        {!! $evento->valor !!}
</div>
--}}
    <section class="d-flex justify-content-evenly flex-wrap">
        @forelse ($evento->fotos as $foto)
            <div class="card " style="width: 18rem;">
                <img src="{{ Voyager::image($foto->thumbnail('medium', 'original')) }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"></h5>
                    <p class="card-text">{{ $evento->evento_id }}</p>
                    <a href="/carrinho" class="btn btn-primary">selecionar</a>
                </div>
            </div>
        @empty
            <p>Não há fotos cadastradas</p>
        @endforelse
    </section>

    @endsection