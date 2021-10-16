@extends(Config::get('marrs-admin.template.admin'))
@section('title')
    <h1><i class="fas fa-list"></i> | Menu</h1>
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::model($menu, ['url' => route('admin.menus.update', $menu->id), 'files' => true, 'method' => 'PUT']) !!}

            @include("marrs-admin::cruds.menus._form")

            {!! Form::close() !!}
        </div>
    </div>
@stop
