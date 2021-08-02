@extends(Config::get('marrs-admin.template.admin'))

@section('title')
    <h1><i class="fas fa-list"></i> | Menu</h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['url' => route('admin.menus.store'), 'files' => true]) !!}

            @include("marrs-admin::cruds.menus._form")

            {!! Form::close() !!}
        </div>
    </div>
@stop
