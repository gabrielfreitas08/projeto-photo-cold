@extends('layouts.app')

@section('conteudo')
    @includeIf('componentes.header')
    <section class="page-section">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Templates</h2>
                <h3 class="section-subheading text-muted">Alguns templates Bootstrap gratuitos.</h3>
            </div>
            <ul class="list-group">
                <li class="list-group-item"><a
                        href="https://startbootstrap.com/?showPro=false&showAngular=false&showVue=false">startbootstrap</a>
                </li>
                <li class="list-group-item"><a href="https://bootstrapmade.com/">bootstrapmade</a></li>
                <li class="list-group-item"><a href="https://mdbootstrap.com/publications/free-templates/">mdbootstrap</a>
                </li>
                <li class="list-group-item"><a href="https://uideck.com/free-bootstrap-templates/">uideck</a></li>
                <li class="list-group-item"><a href="https://webthemez.com/free-bootstrap-templates/">webthemez</a></li>
                <li class="list-group-item"><a href="https://www.creative-tim.com/bootstrap-themes/free">template</a></li>
                <li class="list-group-item"><a href="https://themefisher.com/free-bootstrap-templates">bootstrap-themes</a>
                </li>
                <li class="list-group-item"><a href="https://bootstrap.build/templates">bootstrap.build</a></li>
                <li class="list-group-item"><a href="https://getbootstrap.com/docs/5.2/examples/">bootstrap examples</a>
                </li>
            </ul>
    </section>
    @includeIf('componentes.services')
    @includeIf('componentes.about')
    @includeIf('componentes.team')
    {{--@includeIf('componentes.clients')
    @includeIf('componentes.contact')--}}
@endsection
