@extends('layouts.app')

@section('conteudo')

    <div class="alert alert-success text-center flex-wrap mt-lg-5 m-md-5">
        <h2>Pedido {{$pedido->id}} confirmado, aguarde a confirmação de pagamento</h2>
    </div>

    <div>
        <h2 class="m-lg-5"> Os itens do seu pedido foram
            <i class="fa-solid fa-down-long"></i>
        </h2>
        @foreach($pedido->fotos as $foto)
            <div class="flex-wrap card" style="width: 18rem;">
                <img src="{{Voyager::image($foto?->thumbnail('small', 'original'))}}" alt="imagem-pedido"
                     class="rounded card-img-top">
            </div>
        @endforeach
    </div>
    <div class="flex-wrap mt-lg-5 m-md-5 card">
        <h4 class="card-body">Após seu pedido ser confirmado o pagamento, você receberá em seu e-mail as fotos</h4>
    </div>
@endsection
