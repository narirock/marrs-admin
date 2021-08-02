$(document).ready(function () {

    tinymce.init({
        selector: '.editor',
        setup: function (editor) {
            editor.on('change', function () {
                editor.save();
            });
            editor.on('blur', function () {
                customAutosave();
            });
        },
        min_height: 600,
        resize: "vertical",
        plugins: "link, image, code, table, lists",
        apiKey: "VCZSDFLT",
        extended_valid_elements: "input[id|name|value|type|class|style|required|placeholder|autocomplete|onclick]",

        file_browser_callback: function (e, t, n, i) {
            "image" == n && $("#upload_file").trigger("click")
        },
        init_instance_callback: function (editor) {
            $(".tox-statusbar__branding").hide();
        },
        file_picker_callback: function (callback, value, meta) {
            // Provide file and text for the link dialog
            if (meta.filetype == 'file') {
                // Trigger click on file element
                $("#fileupload").trigger("click");
                $("#fileupload").unbind('change');
                // File selection
                $("#fileupload").on("change", function () {
                    var file = this.files[0];
                    var reader = new FileReader();

                    // FormData
                    var fd = new FormData();
                    var files = file;
                    fd.append("file", files);
                    fd.append('filetype', meta.filetype);

                    var filename = "";

                    // AJAX
                    jQuery.ajax({
                        url: "/admin/image/upload",
                        type: "post",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: fd,
                        contentType: false,
                        processData: false,
                        async: false,
                        success: function (response) {
                            if (response.success) {
                                filename = response.src;
                                callback('/' + filename, {
                                    text: ''
                                });
                            }
                        }
                    });
                });
            }
        },
        images_upload_handler: function (blobInfo, success, failure) {
            var xhr, formData;
            xhr = new XMLHttpRequest();
            xhr.withCredentials = false;
            xhr.open('POST', '/admin/image/upload');
            xhr.setRequestHeader("X-CSRF-Token", $('meta[name="csrf-token"]').attr('content'));

            xhr.onload = function () {
                var json;

                if (xhr.status != 200) {
                    failure('HTTP Error: ' + xhr.status);
                    return;
                }

                json = JSON.parse(xhr.responseText);

                if (!json || typeof json.location != 'string') {
                    failure('Erro ao realizar upload');
                    return;
                }

                success(json.location);
            };

            formData = new FormData();
            formData.append('file', blobInfo.blob(), blobInfo.filename());

            xhr.send(formData);
        },
        toolbar: "styleselect bold italic underline | forecolor backcolor | alignleft aligncenter alignright | bullist numlist outdent indent | link image table | code",
        convert_urls: !1,
        image_caption: !0,
        image_title: !0,
    });




    //buscar cep
    $('#CEP').on('blur', function () {
        //Nova variável "cep" somente com dígitos.
        var cep = $(this).val().replace(/\D/g, '');
        //Verifica se campo cep possui valor informado.
        if (cep != "") {
            $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function (dados) {
                if (!("erro" in dados)) {
                    $("#Logradouro").val(dados.logradouro);
                    $("#Bairro").val(dados.bairro);
                    $("#Cidade").val(dados.localidade);
                    $("#Estado").val(dados.uf);
                    $("#Pais").val('Brasil');
                } else {
                    alert("CEP não encontrado.");
                }
            });
        }
    });

    //validação de cnpj
    if ($("#CNPJ").length) {
        if ($("#CNPJ").val().length > 14) {
            isJuridica();
        } else {
            isFisica();
        }
    }

    $("#CNPJ").on('keyup', function () {
        let input = $(this);
        if (input.val().length > 14) {
            VMasker(input).maskPattern('99.999.999/9999-99');
            isJuridica();
        } else {
            VMasker(input).maskPattern('999.999.999-99');
            isFisica();
        }
    });

    $("#CPF").on('keyup', function () {
        let input = $(this);
        VMasker(input).maskPattern('999.999.999-99');
    });


    //formatando decimais
    $(".decimal").on('keyup', function () {
        let input = $(this);
        console.log(input.val());
        VMasker(input).maskMoney();
    });

    $(".decimal").each(function () {
        let input = $(this);
        VMasker(input).maskMoney();
    })


    $("#Facebook").on('blur', function () {
        var Facebook = $(this).val();
        $("#profile").html("carregando imagem");

        $.ajax({
            type: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/facebook/getProfileID',
            data: { 'Facebook': Facebook },
            success: function (data) {
                $("#profile").html("<img src='" + data + "' height='40px'>");
                $("#img_facebook").val(data);
            }
        });
    });

    $('.data-table').DataTable({ "language": { "url": "/assets/admin/json/datatables.json" } });

});

function setslug(str, target) {
    str = str.replace(/^\s+|\s+$/g, ''); // trim
    str = str.toLowerCase();

    // remove accents, swap ñ for n, etc
    var from = "àáäâãèéëêìíïîòóöôùúüûñç·/_,:;";
    var to = "aaaaaeeeeiiiioooouuuunc------";
    for (var i = 0, l = from.length; i < l; i++) {
        str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
    }

    str = str.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
        .replace(/\s+/g, '-') // collapse whitespace and replace by -
        .replace(/-+/g, '-'); // collapse dashes
    $("#" + target).val(str);
}
//edição de labels dos formularios de acordo com o tipo de pessoa.
function isJuridica() {
    $("label[for='CNPJ']").html('CNPJ');
    $("#RazaoSocial").attr("placeholder", "Razão Social");
    $("label[for='RazaoSocial']").html('Razão Social');
    $("#NomeFantasia").attr("placeholder", "Nome Fantasia");
    $("label[for='NomeFantasia']").html('Nome Fantasia');
}

function isFisica() {
    $("label[for='CNPJ']").html('CPF');
    $("#RazaoSocial").attr("placeholder", "Nome");
    $("label[for='RazaoSocial']").html('Nome');
    $("#NomeFantasia").attr("placeholder", "Apelido");
    $("label[for='NomeFantasia']").html('Apelido');
}


//
function packagescalc() {
    let itemData = $("#itemData").val();
    let total = 0;
    $.ajax({
        method: 'post',
        url: '/admin/packages/calcular',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: 'ItemData=' + itemData,
        success: function (result) {
            $("#Valor").val(result.Valor);
            $("#ComissaoColaborador").val(result.ComissaoColaborador);
            $("#ComissaoRepresentante").val(result.ComissaoRepresentante);
        }
    });
}


