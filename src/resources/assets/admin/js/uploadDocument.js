$("#document_upload").on('click', function () {
    //criando form de envio
    var form_data = new FormData();

    var proceed = true;

    if (!window.File && window.FileReader && window.FileList && window.Blob) {
        alert("Seu browser não suporta a API de upload de arquivos! Por favor atualize-o.");
        proceed = false;
    } else {

        //Limit Files Selection
        var total_selected_files = $("#document_file:file", this).length;
        if (total_selected_files > 3) { //limit number of files allowed to 3
            alert("Você selecionou  " + total_selected_files + " arquivo(s), selecione no maximo 3!");
            proceed = false;
        }

        //iterate files in file input field
        var total_files_size = 0;
        var files = $("#document_file:file").prop("files");
        console.log(files);
        for (var i = 0; i < files.length; i++) {

            if (files[i].value !== "") {
                if (['application/pdf'].indexOf(files[i].type) === -1) {
                    alert("Arquivo " + files[i].name + " não suportado!");
                    proceed = false;
                }

                //adicionando arquivo ao form 
                var file_data = $("#document_file:file").prop("files")[i];
                form_data.append("file[]", file_data);
                form_data.append("name[]", $("#doc_name").val());
                form_data.append("type[]", $("#doc_type").val());
                total_files_size = total_files_size + files[i].size;
            }
        }

        //if total file size is greater than max file size
        if (total_files_size > 1048576) {
            alert("A soma dos arquivos ultrapassa 1 MB!");
            proceed = false;
        }

        if (proceed) {
            console.log('enviando imagens');

            $.ajax({
                url: "/admin/file/uploadname",
                type: 'POST',
                headers: { 'X-CSRF-TOKEN': $("meta[name=csrf-token]").attr('content') },
                data: form_data,
                //Options to tell JQuery not to process data or worry about content-type
                cache: false,
                contentType: false,
                processData: false,
                success: function (data) {
                    $(".document-upload tbody").append(data);
                    start_upload_plugin();
                }
            });
        }
    }

});

function start_upload_plugin() {
    $("#file_upload").val("");

    $('.remove-image').unbind('click');
    $(".remove-image").click(function () {
        $(this).closest('tr').remove();
    });

    $(".image-to-up,.image-to-down").unbind('click');
    $(".image-to-up,.image-to-down").click(function () {
        var row = $(this).parents("tr:first");
        if ($(this).is(".image-to-up")) {
            row.insertBefore(row.prev());
        } else {
            row.insertAfter(row.next());
        }
    });
}

start_upload_plugin();