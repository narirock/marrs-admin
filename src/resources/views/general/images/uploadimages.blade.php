<div class="field-upload">
    <div>
        <div class="row">
            <div class="col-sm-12 col-md-8 col-xs-12">
                <div class="form-group">
                    {!! Form::label('file_upload', 'Arquivo') !!}
                    {!! Form::file('file_upload', null, ['class' => 'form-control', 'id' => 'file_upload', 'multiple' => 'false']) !!}
                </div>
            </div>
        </div>
    </div>
    <table class="table table-striped table-bordered table-responsive-sm">
        <thead>
            <tr>
                <th colspan="4">Imagens</th>
            </tr>
        </thead>
        <tbody>
            @if (!is_null(@$files))
                @include('marrs-admin::general.images.rowfile')
            @endif
        </tbody>
    </table>
</div>
