@if ($errors->any())
    <div class="row">
        <div class="col col-sm-12">
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">{{ $error }}</div>
            @endforeach
        </div>
    </div>
@endif
