@extends('marrs-admin::layouts.blank')
@section('meta')
    <title>Marrs Studio | Login</title>
    <link rel="icon" sizes="192x192" href="/site/images/favicon.png">
@endsection

@section('content')

    <header class="login-header">
        <div class="container">
            <div class="content"></div>
        </div>
    </header>
    <header class="reset-header"
        style="background:linear-gradient(0deg,rgba(5, 11, 20, 0.678),rgba(47, 47, 47, 0.459)),url('/site/instashop/images/about_bg.jpg');">
    </header>
    <section class="login-section">
        <div class="container">
            <form method="POST" action="/admin/password/email">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="card card-login">
                            <div class="card-body">
                                <div class="text-left">
                                    {{-- <img src="/site/images/login.png" width="200" alt=""> --}}
                                    <h3><i class="fas fa-unlock-alt"></i> Reset de Senha</h3>
                                    {{-- <p>Entre com suas credenciais e acesse sua conta</p> --}}
                                </div>
                                @csrf
                                @if (@$errors)
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                @endif
                                @if (Session::has('message'))
                                    <p class="alert alert-success">{{ Session::get('message') }}</p>
                                @endif

                                <div class="form-group row">
                                    <input placeholder="Digite seu email cadastrado" id="email" type="email"
                                        class="form-control @if (@$errors) @error('email') is-invalid @enderror @endif" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @if (@$errors)
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    @endif
                                </div>

                                <div class="form-group row mb-0">

                                    <button type="submit" class="btn btn-dark btn-block">
                                        Enviar Link de Redefinição
                                    </button>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>

@endsection
