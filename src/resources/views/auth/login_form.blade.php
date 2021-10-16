@extends('marrs-admin::layouts.blank')

@section('styles')
    <link href="{{ asset('admin/css/login.css') }}" rel="stylesheet">
@endsection

@section('content')
    <section class="login-section">
        <div class="container">
            <div class="card card-container">
                <img id="profile-img" class="profile-img-card" src="{{ Config::get('marrs-admin.logo') }}" />
                <p id="profile-name" class="profile-name-card"></p>
                {!! Form::open(['url' => route('admin.login'), 'method' => 'POST']) !!}
                <div class="row">
                    <div class="col-12">
                        @if ($errors->has('message'))
                            <div class="alert alert-danger">{{ $errors->first('message') }}</div>
                        @endif
                        <input type="hidden" name="redirect" value="{{ @$redirect }}">
                        <!-- Material outline input -->
                        <div class="md-form md-outline form-lg">
                            {!! Form::text('email', null, ['class' => 'form-control form-control-lg']) !!}
                            <label for="email">Email</label>
                        </div>

                        <!-- Material outline input -->
                        <div class="md-form md-outline">
                            {!! Form::password('password', ['class' => 'form-control form-control-lg']) !!}
                            <label for="password">Password</label>
                        </div>

                        <button type='submit' class="btn btn-block btn-primary">Prosseguir</button>
                        <hr>
                        <div class="row justify-content-center">
                            <div class="col col-md-12 text-center">
                                <a href="/admin/password" class="">
                                    <small>Esqueci a senha</small>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
                {{ Form::close() }}
            </div>
        </div>
    </section>
@endsection
