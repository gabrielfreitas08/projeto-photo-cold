@extends('layouts.app')

@section('conteudo')

{{--
@forelse ($eventos as $evento) {{-- percorrer um vetor >>
<li>{{ $evento->titulo }} {{-- colocar valor na variavel >>
{!! $evento->descricao !!}</li> --}}

@forelse ($eventos as $evento)
    <div class="alert alert-dark " role="alert"> {{--
       <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
           <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
       </svg> --}}
        {{--<img src="{{ Voyager::image($evento->capa->baixa_resolucao) }}" class="card-img-top" alt="...">--}}

        <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex">
            <img src="{{Voyager::image($evento->capa->thumbnail('small', 'original'))}}" />

            <div class="px-4">
            <b> {{ $evento->titulo }} </b>
                {!! $evento->descricao !!}
                {!! $evento->dia_realizado !!} <br>
                R${!! $evento->valor!!}
            </div>
            </div>
            <a href="{{route('view', [$evento->id])}}" class="btn btn-secondary d-flex justify-content-end">Ver evento</a>
                    {{-- rota antiga, fotos --}}
        </div>

    </div>

@empty
    <p>Não há eventos cadastrados</p>
@endforelse

@endsection
