
$(document).ready(function () {



    $(".uploadFile").on('change', function () {
        var retorno = $(this).attr('return');
        var fieldFile = $(this);
        var form_data = new FormData();

        var proceed = true;

        if (!window.File && window.FileReader && window.FileList && window.Blob) {
            alert("Seu browser não suporta a API de upload de arquivos! Por favor atualize-o.");
            proceed = false;
        } else {
            if (fieldFile.prop("files").length) {

                var file_data = fieldFile.prop("files")[0];
                form_data.append("file", file_data);
                //adicionando token para autenticação do envio
                form_data.append("_token", $('meta[name="csrf-token"]').attr('content'));

                $.ajax({
                    url: '/admin/file/uploads',
                    xhr: function () { // custom xhr (is the best)
                        var xhr = new XMLHttpRequest();
                        var total = 0;
                        $("#progresso").show();
                        // Get the total size of files
                        total = fieldFile.prop("files")[0].size;
                        var $modal = $('.js-loading-bar'),
                            $bar = $modal.find('.progress-bar');
                        $bar.css('width', '0%');
                        $modal.modal('show');
                        // Called when upload progress changes. xhr2
                        xhr.upload.addEventListener("progress", function (evt) {
                            // show progress like example
                            var loaded = (evt.loaded / total).toFixed(2) * 100; // percent
                            if (loaded >= 100) {
                                loaded = 100;
                                $modal.modal('hide');
                            }
                            $bar.css('width', loaded + '%');
                        }, false);
                        return xhr;
                    },
                    type: 'post',
                    processData: false,
                    contentType: false,
                    data: form_data,
                    success: function (data) {
                        if (data.success == true) {
                            console.log(retorno);
                            $("#" + retorno).val(data.src);
                            //fieldFile.hide();
                        } else {
                            alert(data.message);
                        }
                    }
                });
            } else {
                alert('selecione uma imagem');
            }
        }
    });

    $(".uploadImage").on('change', function () {
        var retorno = $(this).attr('return');
        var preview = $(this).attr('preview');
        var fieldFile = $(this);
        var form_data = new FormData();

        var proceed = true;

        if (!window.File && window.FileReader && window.FileList && window.Blob) {
            alert("Seu browser não suporta a API de upload de arquivos! Por favor atualize-o.");
            proceed = false;
        } else {
            if (fieldFile.prop("files").length) {

                var file_data = fieldFile.prop("files")[0];
                form_data.append("file", file_data);
                //adicionando token para autenticação do envio
                form_data.append("_token", $('meta[name="csrf-token"]').attr('content'));

                $.ajax({
                    url: '/admin/file/uploads',
                    xhr: function () { // custom xhr (is the best)
                        var xhr = new XMLHttpRequest();
                        var total = 0;
                        $("#progresso").show();
                        // Get the total size of files
                        total = fieldFile.prop("files")[0].size;
                        var $modal = $('.js-loading-bar'),
                            $bar = $modal.find('.progress-bar');
                        $bar.css('width', '0%');
                        $modal.modal('show');
                        // Called when upload progress changes. xhr2
                        xhr.upload.addEventListener("progress", function (evt) {
                            // show progress like example
                            var loaded = (evt.loaded / total).toFixed(2) * 100; // percent
                            if (loaded >= 100) {
                                loaded = 100;
                                $modal.modal('hide');
                            }
                            $bar.css('width', loaded + '%');
                        }, false);
                        return xhr;
                    },
                    type: 'post',
                    processData: false,
                    contentType: false,
                    data: form_data,
                    success: function (data) {
                        if (data.success == true) {
                            console.log(retorno);
                            $("#" + retorno).val(data.src);
                            $("#" + preview).html("<img src='/" + data.src + "' width='100%'/>");
                            //fieldFile.hide();
                        } else {
                            alert(data.message);
                        }
                    }
                });
            } else {
                alert('selecione uma imagem');
            }
        }
    });




    /*$("#pdf").on('change', function () {
        //criando form de envio
        var form_data = new FormData();

        var proceed = true;

        if (!window.File && window.FileReader && window.FileList && window.Blob) {
            alert("Seu browser não suporta a API de upload de arquivos! Por favor atualize-o.");
            proceed = false;
        } else {

            //Limit Files Selection
            var total_selected_files = $("#fileUpload:file", this).length;
            if (total_selected_files > 3) { //limit number of files allowed to 3
                alert("Você selecionou  " + total_selected_files + " arquivo(s), selecione no maximo 3!");
                proceed = false;
            }

            //iterate files in file input field
            var total_files_size = 0;
            var files = $("#fileUpload:file").prop("files");
            console.log(files);
            for (var i = 0; i < files.length; i++) {
                if (files[i].value !== "") {
                    if (['image/png', 'image/gif', 'image/jpeg', 'image/pjpeg'].indexOf(files[i].type) === -1) {
                        alert("Arquivo <b>" + files[i].name + "</b> não suportado!");
                        proceed = false;
                    }

                    //adicionando imagens ao form
                    var file_data = $(this).prop("files")[i];
                    form_data.append("file[]", file_data);

                    total_files_size = total_files_size + files[i].size;
                }
            }

            //if total file size is greater than max file size
            if (total_files_size > 1048576) {
                alert("A soma dos arquivos ultrapassa 1 MB!");
                proceed = false;
            }

        }

        //if everything looks good, proceed with jQuery Ajax
        if (proceed) {

            //adicionando token para autenticação do envio
            form_data.append("_token", $('meta[name="csrf-token"]').attr('content'));

            $.ajax({
                url: '/admin/uploads/create',
                xhr: function () { // custom xhr (is the best)

                    var xhr = new XMLHttpRequest();
                    var total = 0;

                    $("#progresso").show();

                    // Get the total size of files
                    $.each(document.getElementById('fileUpload').files, function (i, file) {
                        total += file.size;
                    });

                    // Called when upload progress changes. xhr2
                    xhr.upload.addEventListener("progress", function (evt) {
                        // show progress like example
                        var loaded = (evt.loaded / total).toFixed(2) * 100; // percent
                        if (loaded > 100) {
                            loaded = 100;
                        }
                        $("#progresso").html(loaded + '%');
                        console.log('Uploading... ' + loaded + '%');
                    }, false);


                    return xhr;
                },
                type: 'post',
                processData: false,
                contentType: false,
                data: form_data,
                success: function (data) {

                    $("#progresso").html('');
                    $("#progresso").hide();

                    if (data.status) {

                        var imgs = [];
                        var tx_images = $("#Imagens").val();

                        //verificando se ja existem imagens anexas
                        if (tx_images != "") {
                            imagens = JSON.parse($("#Imagens").val());
                            $.each(imagens, function (index, value) {
                                imgs.push(value);
                            });
                        }

                        //incluindo novas imagens
                        jQuery.each(data.upfiles, function (i, val) {
                            imgs.push(val);
                        });

                        recarregaritens(imgs);

                        $(".img-mark").on("click", function () {
                            var index = $(this).attr("index");
                            var src = $(this).attr("src");
                            $("#preview").attr("src", src);
                            $("#preview").css("width", "450px");
                            $("#preview").css("height", "300px");
                        });

                    } else {
                        alert(data.message);
                    }
                }
            });
        }
    });*/

});

/*function initialize() {
    $(".progresso").hide();

    //carregando as imagens
    $("#progresso").html('');
    $("#progresso").hide();

    if ($("#Imagens").length) {
        var imgs = [];
        var tx_images = $("#Imagens").val();
        if ($("#Imagens").val() != "") {
            imagens = JSON.parse($("#Imagens").val());
        } else {
            imagens = [];
        }
        recarregaritens(imagens);
    }


}

function remover(index) {
    var r = confirm("Deseja Remover a imagem?");
    if (r == true) {
        var src = $(this).attr("scr");
        var imgs = [];
        var tx_images = $("#Imagens").val();
        var index = $(this).attr("index");

        //verificando se ja existem imagens anexas
        if (tx_images != "") {
            imagens = JSON.parse($("#Imagens").val());
            $.each(imagens, function (index, value) {
                imgs.push(value);
            });
        }

        imgs.splice(imgs.indexOf(src), 1);

        recarregaritens(imgs);
    }
}

function recarregaritens(imgs) {
    $("#Imagens").val(JSON.stringify(imgs));

    //ajustando navegação das imagens
    $("#img_nav").html("");
    jQuery.each(imgs, function (i, val) {
        $("#img_nav").append("<li><img src='/" + val + "' whidth='45' height='30' class='img-mark' index='" + i + "' ondblclick='remover(" + i + ")'/></li>");
    });

    $(".img-mark").on("click", function () {
        var index = $(this).attr("index");
        var src = $(this).attr("src");
        $("#preview").attr("src", src);
        $("#preview").css("width", "450px");
        $("#preview").css("height", "300px");
    });
}*/
