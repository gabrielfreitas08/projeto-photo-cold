@extends('layouts.app')

@section('section')

    <section class="login-fundo">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header text-center"> <i class="fa-solid fa-id-card"></i> {{ __('Register') }}</div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="row mb-3">
                                    <div class="input-group flex-nowrap d-flex justify-content-center">
                                    {{--<label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>--}}
                                        <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-person"></i></span>

                                    <div class="col-md-6">
                                        <input id="name" placeholder="Name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="input-group flex-nowrap d-flex justify-content-center">
                                    {{--<label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>--}}
                                    <span class="input-group-text " id="addon-wrapping"><i class="fa-solid fa-envelope"></i></span>

                                    <div class="col-md-6">

                                        <input id="email" placeholder="Email Address" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="input-group flex-nowrap d-flex justify-content-center">
                                    {{--<label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>--}}
                                        <span class="input-group-text " id="addon-wrapping"><i class="fa-brands fa-keycdn"></i></span>

                                    <div class="col-md-6">
                                        <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="input-group flex-nowrap d-flex justify-content-center">
                                    {{--<label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>--}}
                                        <span class="input-group-text " id="addon-wrapping"><i class="fa-brands fa-keycdn"></i></span>

                                    <div class="col-md-6">
                                        <input id="password-confirm" placeholder="Confirm Password" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-dark">
                                            {{ __('Register') }}
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
