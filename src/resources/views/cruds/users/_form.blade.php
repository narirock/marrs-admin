@include("marrs-admin::partials._error")

<div class="form-group">
    {!! Form::label('name', 'Nome') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nome']) !!}
</div>
<div class="form-group">
    {!! Form::label('email', 'e-mail') !!}
    {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) !!}
</div>

<div>
    {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('admin.users.index') }}" class="btn btn-danger">Fechar</a>
</div>
