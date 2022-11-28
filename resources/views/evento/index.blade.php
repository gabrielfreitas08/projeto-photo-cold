@extends('layouts.app')

@section('conteudo')

    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{route('eventos')}}">Eventos</a>
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

            <form action="{{route('eventos')}}" class="d-flex" role="search" >
                <input class="form-control me-2" type="search" name="filtro" placeholder="Filtrar" aria-label="Search">
                <button class="btn btn-outline-dark" type="submit">Filtrar</button>
            </form>
        </div>
        </div>
    </nav>


    <div class="album py-5 bg-light">
        <div class="container">

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @forelse ($eventos as $evento)
                <div class="col">
                       <div class="card shadow-sm">
                           <img class="bd-placeholder-img card-img-top" width="100%" height="225"
                                src="{{Voyager::image($evento?->capa?->thumbnail('small', 'original'))}}" alt="foto-evento"/>

                        <div class="card-body">
                            <p class="card-text">
                                <b> {{ $evento->titulo }} </b>
                               {{-- {!! $evento->descricao !!} --}}
                                {{--R${!! $evento->valor!!}--}}
                            </p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="{{route('eventos.show', [$evento->id])}}" class="btn btn-sm btn-outline-secondary">Visualizar</a>
                                </div>
                                <small class="text-muted">{{$evento->cidade?->nome}} - {{ $evento->dia_realizado }}</small>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                    <p>Não há eventos públicos cadastrados para visualização</p>
                @endforelse
            </div>
        </div>
    </div>


@endsection
