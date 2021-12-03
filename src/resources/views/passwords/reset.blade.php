@extends('marrs-admin::layouts.blank')


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
            <form method="POST" action="/admin/password/update">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="card card-login">
                            <div class="card-body">
                                <div class="text-left">
                                    <h3><i class="fas fa-unlock-alt"></i> Reset de Senha</h3>
                                </div>
                                @csrf

                                <input type="hidden" name="token" value="{{ $token }}">

                                <div class="form-group row">
                                    <label for="email" class="col-md-12 col-form-label">e-mail</label>

                                    <div class="col-md-12">
                                        <input id="email" type="email" class="form-control @if (@$errors) @error('email') is-invalid @enderror @endif"
                                            name="email" value="{{ $email ?? old('email') }}" required
                                            autocomplete="email" readonly="readonly">
                                        @if (@$errors)
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-12 col-form-label">Senha</label>

                                    <div class="col-md-12">
                                        <input id="password" type="password" class="form-control @if (@$errors) @error('password') is-invalid @enderror @endif"
                                            name="password" required autocomplete="new-password">
                                        @if (@$errors)
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password-confirm" class="col-md-12 col-form-label">Confirmação</label>

                                    <div class="col-md-12">
                                        <input id="password-confirm" type="password" class="form-control"
                                            name="password-confirm" required autocomplete="new-password">
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-secondary btn-block">
                                            Enviar nova senha
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </section>

@endsection
