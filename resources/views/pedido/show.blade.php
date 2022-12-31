@extends('layouts.app')

@section('conteudo')

    <div class="alert alert-success text-center flex-wrap mt-lg-5 m-md-5">
        <h2>Pedido {{$pedido->id}} </h2>
    </div>

    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th>Foto</th>
                <th>Evento</th>
                <th>Fotógrafo</th>
                <th>Preço</th>
            </tr>
            </thead>

            <tbody>

            @foreach($pedido->fotos as $foto)
                <tr>
                    <div class="flex-wrap mb-3 ">
                        <th><img src="{{Voyager::image($foto?->thumbnail('small', 'original'))}}" alt="imagem-pedido"
                                 class="rounded card-img-top imagem-pedido">
                        </th>
                    </div>
                        <td> {{$foto?->evento?->titulo ?? 'Evento Inválido'}} </td>
                        <td> {{$foto?->evento?->user?->name ?? 'Fotógrafo Inexistente'}} </td>
                        <td> {{$foto?->evento?->getValorFormtadoReal() ?? 0}} </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>


@endsection
