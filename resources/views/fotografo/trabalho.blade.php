@extends('layouts.app')

@section('conteudo')

    <div class="container mt-lg-5">
        <h3>Veja os trabalhos realizados de {{$fotografo?->user?->name}}</h3>
    </div>
    <div id="carouselExampleControls" class="carousel carousel-dark slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach($trabalhos as $trabalho)
                @if ($loop->first)
                    <div class="carousel-item active">
                        @else
                            <div class="carousel-item ">
                                @endif
                                <img src="{{ Voyager::image($trabalho) }}" class="d-block w-80" alt="..."/>
                            </div>
                            @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button"
                            data-bs-target="#carouselExampleControls"
                            data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button"
                            data-bs-target="#carouselExampleControls"
                            data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
        </div>

@endsection
