@include("marrs-admin::partials._error")

<div class="row">
    <div class="col col-sm-12">
        <div class="form-group">
            {!! Form::label('name', 'Nome') !!}
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nome']) !!}
        </div>
    </div>
    <div class="col col-sm-6">
        <div class="form-group">
            {!! Form::label('link', 'Link') !!}
            {!! Form::text('link', null, ['class' => 'form-control', 'placeholder' => 'Link']) !!}
        </div>
    </div>
    <div class="col col-sm-6">
        <div class="form-group">
            {!! Form::label('route', 'Route') !!}
            {!! Form::text('route', null, ['class' => 'form-control', 'placeholder' => 'Rota']) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col col-sm-4">
        <div class="form-group">
            {!! Form::label('icon_class', 'Classe de icone') !!}
            {!! Form::text('icon_class', null, ['class' => 'form-control', 'placeholder' => 'ex: fas fa-user']) !!}
        </div>
    </div>
    <div class="col col-sm-4">
        <div class="form-group">
            {!! Form::label('type', 'Tipo') !!}
            {!! Form::select('type', ['menu' => 'menu', 'title' => 'title'], null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col col-sm-4">
        <div class="form-group">
            {!! Form::label('menu_id', 'Menu Pai') !!}
            {!! Form::select('menu_id', $another, null, ['class' => 'form-control', 'placeholder' => 'Selecionar']) !!}
        </div>
    </div>
</div>


<div>
    {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('admin.menus.index') }}" class="btn btn-danger">Fechar</a>
</div>
