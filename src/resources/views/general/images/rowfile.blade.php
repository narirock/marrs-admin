@foreach ($files as $file)
    <tr>
        <td class="text-center">
            <img src="/{{ $file->link }}" height="100px" alt="">
            {!! Form::hidden('arquivo[]', $file->link, ['class' => 'form-control']) !!}
        </td>
        <td class="text-center align-middle" width="15px">
            <div class="btn btn-small btn-primary image-to-up"><i class="fa fa-arrow-up"></i></div>
        </td>
        <td class="text-center align-middle" width="15px">
            <div class="btn btn-small btn-primary image-to-down "><i class="fa fa-arrow-down"></i></div>
        </td>
        <td class="text-center align-middle" width="15px">
            <div class="btn btn-small btn-danger remove-image"><i class="fa fa-trash"></i></div>
        </td>
    </tr>
@endforeach
