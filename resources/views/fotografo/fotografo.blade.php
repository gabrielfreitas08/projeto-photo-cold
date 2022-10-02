@extends('layouts.app')

@section('conteudo')
{{-- percorrer um vetor --}}
{{--<li>{{ $users->id }} --}}{{-- colocar valor na variavel --}}{{--
   --}}{{-- <img class="foto" src="{{Voyager::image($foto->baixa_resolucao)}}" alt="">--}}{{--
    {{ $users->name}}
</li>--}}

<section class="d-flex justify-content-evenly flex-wrap">
    @forelse ($fotografo as $foto)
        <div class="card " style="width: 18rem;">
            <img src="{{ Voyager::image($foto->avatar) }}" class="card-img-top" alt="...">
            {{--<img src="{{ Voyager::image($foto->thumbnail('medium', 'original')) }}" class="card-img-top" alt="...">--}}
            <div class="card-body">
                <h5 class="card-title">{{ $foto->name }}</h5>
                <p class="card-text"> cidade </p>
                <a href="{{route('fotografos.show', [$foto->id])}}" class="btn btn-dark">Portfólio</a>
            </div>
        </div>
    @empty
        <p>Não há fotógrafos cadastrados</p>
    @endforelse

</section>

@endsection
