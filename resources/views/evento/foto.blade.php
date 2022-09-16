@extends('layouts.app')

@section('conteudo')

{{--mostrar dados do evento, deixar estilizado --}}

<section class="d-flex justify-content-evenly flex-wrap">
    @forelse ($fotos as $foto)
        {{-- percorrer um vetor --}}
        {{-- <li>{{ $foto->evento_id }} {{-- colocar valor na variavel )
    <img class="foto" src="{{Voyager::image($foto->baixa_resolucao)}}" alt="">
</li> --}}

        <div class="card " style="width: 18rem;">
            {{--<img src="{{ Voyager::image($foto->baixa_resolucao) }}" class="card-img-top" alt="...">--}}
            <img src="{{ Voyager::image($foto->thumbnail('medium', 'original')) }}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"></h5>
                <p class="card-text">{{ $foto->evento_id }}</p>
                <a href="#" class="btn btn-primary">selecionar</a>
            </div>
        </div>
    @empty
        <p>Não há fotos cadastradas</p>
    @endforelse

</section>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>

</body>

</html>
