@extends('layouts.app')

@section('conteudo')

    {{--<section class="d-flex justify-content-evenly flex-wrap">
        @forelse ($fotografo as $foto)
            <div class="card " style="width: 18rem;">
                <img src="{{ Voyager::image($foto->avatar) }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $foto->name }}</h5>
                    <p class="card-text"> cidade </p>
                    <a href="{{route('fotografos.show', [$foto->id])}}" class="btn btn-dark">Portfólio</a>
                </div>
            </div>
        @empty
            <p>Não há fotógrafos cadastrados</p>
        @endforelse

    </section>--}}
<section class="d-flex justify-content-evenly flex-wrap">
    @forelse ($fotografo as $foto)
        <div class="col-lg-4">
            <div class="team-member">
                <img class="mx-auto rounded-circle" src="{{ Voyager::image($foto->avatar) }}" alt="..."/>
                <h4>{{ $foto->name }}</h4>
                <p class="text-muted">Cidade</p>
                <a href="{{route('fotografos.show', [$foto->id])}}" class="btn btn-dark">Portfólio</a>
            </div>
        </div>
    @empty
        <p>Não há fotógrafos cadastrados</p>
    @endforelse
</section>

@endsection
