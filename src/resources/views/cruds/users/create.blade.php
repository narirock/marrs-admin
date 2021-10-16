@extends(Config::get('marrs-admin.template.admin'))

@section('title')
    <h1><i class="fas fa-user"></i> | Usuário</h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['url' => route('admin.users.store'), 'files' => true]) !!}

            @include("marrs-admin::cruds.users._form")

            {!! Form::close() !!}
        </div>
    </div>
@stop
