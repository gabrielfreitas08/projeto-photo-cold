@extends('layouts.app')

@section('conteudo')

    <div class="container mt-lg-5 ">
        <i class="fa-solid fa-dolly"></i>
        <h3 class="">Meus Pedidos</h3>
    </div>

    <table id="tabela-meus-pedidos" class="table table-hover">

        <tr>
            <th scope="col">#</th>
            <th scope="col">Status</th>
            <th scope="col">Valor</th>
            <th scope="col">Ação</th>
        </tr>

        <tbody class="table-group-divider">
        @forelse($pedidos as $pedido)
            <tr>
                <td>{{ $pedido->id }}</td>
                <td>{!!  $pedido->getStatus() !!}</td>
                <td>{{ $pedido->getValorFormtadoReal() }}</td>
                <td>
                    <a href="{{ route('pedido.show', [$pedido->id]) }}" class="btn btn-outline-secondary">Visualizar Pedido </a>
                    <a href="{{ route('pedido.pagamento', [$pedido->id]) }}" class="btn btn-dark"> Informar Pagamento </a>
                </td>
            </tr>

        @empty
            <p>Não há pedidos para serem listados</p>
        @endforelse
        </tbody>
    </table>

@endsection



