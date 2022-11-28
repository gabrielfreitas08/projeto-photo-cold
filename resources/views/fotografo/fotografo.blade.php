@extends('layouts.app')

@section('conteudo')

    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{route('fotografos')}}">Fotógrafos</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>


            <div class="row g-2">
                <div class="col-md">
                    <div class="form-floating align-items-end">
                        <select class="form-select" id="floatingSelectGrid">
                            {{-- <option selected>Filtrar por</option>--}}
                            <option selected value="estado">Estado</option>
                            <option value="cidade">Cidade</option>
                        </select>
                        <label for="floatingSelectGrid">Filtrar por:</label>
                    </div>
                </div>
            </div>

            <form action="{{route('fotografos')}}" class="d-flex" role="search" >
                <input class="form-control me-2" type="search" name="filtro" placeholder="Filtrar" aria-label="Search">
                <button class="btn btn-outline-dark" type="submit">Filtrar</button>
            </form>
        </div>
        </div>
    </nav>

    <section class="d-flex justify-content-evenly flex-wrap">
        @forelse ($fotografos as $fotografo)
            <div class="col-lg-4">
                <div class="team-member">
                    <img class="mx-auto rounded-circle" src="{{ Voyager::image($fotografo->user->avatar) }}" alt="..."/>
                    <h4>{{ $fotografo->user->name }}</h4>
                    <p class="text-muted">{{ $fotografo->cidade?->nome }}, {{$fotografo->cidade?->estado?->sigla}}</p>
                    <a href="{{route('fotografos.show', [$fotografo->id])}}" class="btn btn-dark">Portfólio</a>
                </div>
            </div>
        @empty
            <p>Não há fotógrafos cadastrados</p>
        @endforelse
    </section>

@endsection
