@extends('layouts.app')

@section('conteudo')

    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-cart3 "
         viewBox="0 0 16 16">
        <path
            d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
    </svg> <br>

    <div class="d-flex mb-3 justify-content-evenly">
        <div class="me-auto p-5"> Itens:</div>
        <div class=" p-5">Valor:</div>
    </div>

    <section class=" mx-5 justify-content-evenly flex-wrap">
        @forelse ($carrinho as $foto)
            <div class="d-flex p-2 alert alert-secondary">
                <div>
                    <img width="200" height="200" src="{{ Voyager::image($carrinho->thumbnail('medium', 'original')) }}"
                         class="" alt="...">
                </div>
                <div class="d-flex justify-content-evenly p-lg-5">
                    <p class="justify-content-evenly">
                        [titulo do evento]
                        [fotografo do evento: nome]
                        [valor da foto]
                    </p>
                </div>
                <div class="ms-auto pt-5 d-flex justify-content-end ">
                    <a class="btn btn-dark btn-social mx-2 " href="#" aria-label="#"><i
                            class="fa-solid fa-trash"></i></a>
                </div>
            </div>
        @empty
            <p>Não há fotos adicionadas ao carrinho</p>
        @endforelse
    </section>

    <div class="d-flex justify-content-end p-md-5">
        <a class="" href="#!">
            <button type="button" class="btn btn-dark">Continuar a compra</button>
        </a>
    </div>

@endsection
