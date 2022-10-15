@extends('layouts.app')

@section('conteudo')

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
                                {!! $evento->descricao !!}
                                {{--R${!! $evento->valor!!}--}}
                            </p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="{{route('eventos.show', [$evento->id])}}" class="btn btn-sm btn-outline-secondary">Visualizar</a>
                                </div>
                                <small class="text-muted">{!! $evento->dia_realizado !!}</small>
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
