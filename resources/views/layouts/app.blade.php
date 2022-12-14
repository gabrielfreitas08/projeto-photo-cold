<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    <link rel="stylesheet" href="{{ asset('/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/vendor/font-awesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    @yield('assets')
</head>

<body id="page-top">

@section('menu')
    @include('componentes.menu_publico')
@show


@yield('conteudo')

<section class="page-section">
    @yield('section')
</section>
@section('rodape')

    <!-- Footer-->
    <footer class="footer py-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 text-lg-start">Copyright © {{ env('APP_NAME') }}</div>
                <div class="col-lg-4 my-3 my-lg-0">
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Facebook">
                        <i class="fa-solid fa-file-pdf"></i>
                    </a>
                    <a class="btn btn-dark btn-social mx-2" href="https://github.com/gabrielfreitas08/projeto-photo-cold" aria-label="Github">
                        <i class="fab fa-github"></i>
                    </a>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a class="link-dark text-decoration-none me-3" href="#!">Privacy Policy</a>
                    <a class="link-dark text-decoration-none" href="#!">Terms of Use</a>
                </div>
            </div>
        </div>
    </footer>
@show

@section('javascript')

    <!-- Modal -->
    <div class="modal fade" id="carrinho-modal" tabindex="-1" aria-labelledby="carrinho-modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="carrinho-modalLabel">Carrinho de compras</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('carrinho.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">

                        <table id="tabela-carrinho" class="table">

                        </table>
                        <h4 class="text-center text-success">Total: <span id="valor-total">$ 0,00</span></h4>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-dark" onclick="limparArmazenamentoLocal()">Efetuar pedido</button>
                        <button type="button" class="btn btn-outline-dark" onclick="limparCarrinho()" data-bs-dismiss="modal">Limpar carrinho</button>
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Fechar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        var carrinho = [];

        function atualizarBotaoCarrinho() {
            $botaoCarrinho = document.querySelector("#carrinho-badge");
            if (carrinho.length > 0) {
                $botaoCarrinho.innerHTML = carrinho.length;
                if (!$botaoCarrinho.classList.contains("bg-danger")) {
                    $botaoCarrinho.classList.add("bg-danger");
                }
            } else {
                $botaoCarrinho.innerHTML = '';
                $botaoCarrinho.classList.remove("bg-danger");
            }
        }

        //class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle"

        //somando total
        function preencherTotal(carrinho) {
            var total = 0;
            for (var chave in carrinho) {
                total += parseFloat(carrinho[chave].valor);
            }
            document.getElementById("valor-total").innerHTML = formatarPreco(total);
        }

        //criando a tabela
        function preencherTabelaCarrinho(carrinho) {
            atualizarBotaoCarrinho();
            var table =
                `<thead>
                    <tr>
                        <td> <b>Foto</b> </td>
                        <td> <b>Evento</b> </td>
                        <td> <b>Fotógrafo</b> </td>
                        <td> <b>Preço</b> </td>
                        <td> <b>Ações</b> </td>
                    </tr>
                </thead>
                <tbody>`;
            for (var propriedade in carrinho) {
                table +=
                    `<tr>
                        <input type="hidden" name="fotos[]" value="${carrinho[propriedade].id}">
                        <td><img class="imagem-carrinho" src="${carrinho[propriedade].imagem}"></td>
                        <td>${carrinho[propriedade].evento}</td>
                        <td>${carrinho[propriedade].fotografo}</td>
                        <td>${formatarPreco(carrinho[propriedade].valor)}</td>
                        <td>
                            <button class="btn btn-default" onclick="removerItemDoCarrinho(${propriedade});"><i class="fa-solid fa-trash"></i></button>
                        </td>
                    </tr>`;
            }
            table += '</tbody>';
            document.querySelector('#tabela-carrinho').innerHTML = table;
            preencherTotal(carrinho);
            salvarCarrinho(carrinho);
        }

        //formatando o preço
        function formatarPreco(value) {
            value = parseFloat(value).toFixed(2);
            return `R$ ${value.replace(".", ",")}`;
        }

        //adicionando os dados
        function adicionarItemNoCarrinho() {
            var elementoClicado = event.target;
            // console.log(elementoClicado.dataset);
            carrinho.push(elementoClicado.dataset);
            adicionarEstiloSelecionado(elementoClicado);
            preencherTabelaCarrinho(carrinho);
        }

        function adicionarEstiloSelecionado(elementoClicado){
            elementoClicado.parentNode.classList.add('selecionado');
            elementoClicado.innerHTML = `<i class="fa-solid fa-check"></i> Selecionado`;
            elementoClicado.classList.add("disabled");
            elementoClicado.classList.add("selecionado");
        }

        function removerEstiloSelecionado(elementoClicado){
            elementoClicado.parentNode.classList.remove('selecionado');
            elementoClicado.innerHTML = `<i class="fa-solid fa-cart-plus"></i> Selecionar`;
            elementoClicado.classList.remove("disabled");
            elementoClicado.classList.remove("selecionado");
        }

        //deletando os dados
        function removerItemDoCarrinho(indice) {
            if (confirm("Você realmente deseja remover esse item do carrinho?")) {
                let item = carrinho[indice];
                if (indice === carrinho.length - 1) {
                    carrinho.pop();
                } else if (indice === 0) {
                    carrinho.shift();
                } else {
                    carrinho.splice(indice, 1);
                }

                if (item){
                    let botaoFoto = document.querySelector(`a[data-id="${item.id}"]`);

                    if (botaoFoto != null){
                        removerEstiloSelecionado(botaoFoto);
                    }
                }

                preencherTabelaCarrinho(carrinho);
            }
        }

        //deletando lista
        function limparCarrinho() {
            if (confirm("Você deseja realmente apagar seu carrinho?")) {
                carrinho = [];
                preencherTabelaCarrinho(carrinho);
                let selecionados = document.querySelectorAll('.evento-card.selecionado');
                for (let selecionado of selecionados){
                    console.log(selecionado)
                    selecionado.classList.remove('selecionado');
                    btn = selecionado.querySelector('.selecionado');
                    if(btn){
                        btn.classList.remove('selecionado');
                        btn.classList.remove('disabled');
                        btn.innerHTML = `<i class="fa-solid fa-check"></i> Selecionar`;
                    }
                }

            }
        }

        //limpa o carrinho após a efetuação do pedido
        function limparArmazenamentoLocal(){
            localStorage.clear();
        }

        //salvando em storage
        function salvarCarrinho(carrinho) {
            localStorage.setItem("carrinho", JSON.stringify(carrinho));
        }

        //verifica se já tem algo salvo
        function carregarCarrinho() {
            carrinho = localStorage.getItem("carrinho");
            if (carrinho) {
                carrinho = JSON.parse(carrinho);
            } else {
                carrinho = [];
            }
            preencherTabelaCarrinho(carrinho);
            preencherSelecionados(carrinho);
        }

        function preencherSelecionados (carrinho){
            for (let item in carrinho){
                let id = carrinho[item].id;
                let botaoFoto = document.querySelector(`a[data-id="${id}"]`);
                adicionarEstiloSelecionado(botaoFoto);
            }
        }

        carregarCarrinho();
    </script>
@show


<script src="{{ asset('/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>


</body>

</html>
