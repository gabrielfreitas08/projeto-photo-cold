@extends('layouts.app')

@section('assets')
    <style>
        .page-section {
            background-color: #000000;
        }
    </style>
@endsection

@section('conteudo')

    <section class="login-fundo">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header text-center"> <i class="fa-solid fa-photo-film"></i> {{ __('Solicitar Perfil Fotógrafo') }}</div>

                        <div class="card-body">
                            <form method="POST" action="{{route('fotografo.upgrade', ['id'=>$user->id])}}">
                                @csrf

                                <div class="row mb-3 d-flex justify-content-center">
                                    <div class="col-md-7">
                                        <div class="input-group flex-nowrap d-flex justify-content-center">
                                            <span class="input-group-text" id="addon-email"><i class="fa-regular fa-at"></i></span>
                                            <input type="email" class="form-control" placeholder="Email" name="email" aria-describedby="addon-email" value="{{ old($user->email) }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3 d-flex justify-content-center">
                                    <div class="col-md-7">
                                        <div class="input-group flex-nowrap d-flex justify-content-center">
                                            <span class="input-group-text" id="addon-whats"><i class="fa-brands fa-whatsapp"></i></span>
                                            <input type="tel" class="form-control" placeholder="Whatsapp" name="whatsapp" aria-describedby="addon-whats">
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3 d-flex justify-content-center">
                                    <div class="col-md-7">
                                        <div class="input-group flex-nowrap d-flex justify-content-center">
                                            <span class="input-group-text" id="addon-insta"><i class="fa-brands fa-instagram"></i></span>
                                            <input type="url" class="form-control" placeholder="Link do perfil do Instagram" name="instagram" aria-label="instagram" aria-describedby="addon-insta">
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3 d-flex justify-content-center">
                                    <div class="col-md-7">
                                        <div class="input-group flex-nowrap d-flex justify-content-center">
                                            <span class="input-group-text" id="addon-estado"><i class="fa-solid fa-compass"></i></span>
                                            <select type="url" class="form-select" name="estado" aria-label="estado" aria-describedby="addon-estado">
                                                @foreach($estados as $estado)
                                                    <option value="{{ $estado?->id }}"> {{ $estado?->nome }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-dark">
                                            {{ __('Solicitar Perfil') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
