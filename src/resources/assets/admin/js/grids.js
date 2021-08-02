
function grid_create(entity) {
    $("#" + entity + "Modal").modal('show');
    $("#" + entity + "Action").attr('onclick', "grid_store('" + entity + "')");
}

function grid_store(entity) {
    let object = form_to_object(entity);
    console.log(object);
    if (object.success) {
        let all_data = grid_previous_data(entity);
        all_data.push(object.new_data);
        document.getElementById(entity + 'Data').value = JSON.stringify(all_data);
        grid_refresh_table(entity);
        grid_clear_form(entity);
        $("#" + entity + "Modal").modal('hide');
    } else {
        swal('verifique os campos obrigatorios');
    }
}

function form_to_object(entity) {
    var new_data = {};
    var success = true;

    //utilizando colunas determinadas para validar o preenchimento dos campos.
    let tbody = $("#" + entity + "Table tbody");
    let fields = $("#" + entity + "Table").attr('data-show').split(',');

    $("#" + entity + "Modal :input").each(function (key, input) {

        let tipo = input.type;
        let atributo = input.name;
        input.classList.remove("bg-danger");
        switch (tipo) {
            case 'text':

                fields.map(function (colunm, i) {
                    if (colunm.trim() === atributo) {
                        if (input.value == "") {
                            success = false;
                            input.classList.add("bg-danger");
                        }
                    }
                });

                new_data[atributo] = { 'valor': input.value, 'label': input.value };
                break;

            case 'hidden':
                new_data[atributo] = { 'valor': input.value, 'label': input.value };
                break;

            case 'textarea':
                new_data[atributo] = { 'valor': input.value, 'label': input.value };
                break;

            case 'select-one':
                let label = input.options[input.selectedIndex].text;
                new_data[atributo] = { 'valor': input.value, 'label': label };
                break;
        };

    });


    var resp = {
        'success': success,
        'new_data': new_data
    };


    return resp;
}

function grid_previous_data(entity) {
    var all_data = [];
    if (document.getElementById(entity + 'Data').value !== "") {
        all_data = JSON.parse(document.getElementById(entity + 'Data').value);
    }
    return all_data;
}

function grid_edit(index, entity) {
    let all_data = grid_previous_data(entity);
    let current = all_data[index];
    $("#" + entity + "Modal :input").each(function (key, input) {
        let tipo = input.type;
        let atributo = input.name;
        if (typeof current[atributo] !== 'undefined') {
            switch (tipo) {
                case 'text':
                    input.value = current[atributo].valor;
                    break;

                case 'hidden':
                    input.value = current[atributo].valor;
                    break;

                case 'textarea':
                    //console.log(JSON.stringify(current[atributo]));
                    //input.value = '';//JSON.stringify(current[atributo]);
                    input.value = current[atributo].valor;
                    break;

                case 'select-one':
                    input.value = current[atributo].valor;
                    break;
            };
        }
    });

    $(".gridTorres").each(function () {
        grid_refresh_table($(this).attr("id").replace("Data", ""));
        $(this).hide();
    });

    $("#" + entity + "Modal").modal('show');
    $("#" + entity + "Action").attr('onclick', "grid_update('" + index + "','" + entity + "')");

}

function grid_update(index, entity) {
    let object = form_to_object(entity);
    if (object.success) {
        let all_data = grid_previous_data(entity);
        all_data[index] = object.new_data;
        document.getElementById(entity + 'Data').value = JSON.stringify(all_data);
        grid_refresh_table(entity);
        grid_clear_form(entity);
        $("#" + entity + "Modal").modal('hide');
    } else {
        swal('verifique os campos obrigatorios');
    }
}

function grid_clear_form(entity) {
    $("#" + entity + "Modal :input").each(function (key, input) {

        let tipo = input.type;

        switch (tipo) {

            case 'text':
                input.value = '';
                break;

            case 'textarea':
                input.value = '';
                break;

            case 'select-one':
                input.selectedIndex = 0;
                break;

        };
    });

    $("#" + entity + "Modal tbody").each(function (key, table) {
        $(this).html('');
    });
}

function grid_remove(index, entity) {
    swal({
        title: "Atenção!!",
        text: "Tem certeza que deseja remover este item?",
        icon: "warning",
        buttons: ["Não!", true],
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                all_data = grid_previous_data(entity)
                all_data.splice(index, 1);
                document.getElementById(entity + 'Data').value = JSON.stringify(all_data);
                grid_refresh_table(entity);

                swal("Poof! Item Removido!", {
                    icon: "success",
                });
            }
        });
}

function grid_clear(entity) {
    tbody.html('');
    localStorage.setItem(entity, '');
}

function grid_refresh_table(entity) {
    let tbody = $("#" + entity + "Table tbody");
    let fields = $("#" + entity + "Table").attr('data-show').split(',');
    $("#" + entity + 'Data').change();
    tbody.html("");

    let all_data = grid_previous_data(entity);

    let linhas = "";
    if (all_data.length > 0) {
        all_data.map(function (object, index) {
            linhas += "<tr>";
            fields.map(function (colunm, i) {
                if (object[colunm.trim()] !== undefined) {
                    linhas += '<td>' + object[colunm.trim()].label + '</td>';
                }
            });

            linhas += '<td class="text-center">';
            linhas += '<a href="javascript:;" onclick="grid_edit(\'' + index + '\', \'' + entity + '\')" class="btn btn-info"><i class="fas fa-edit"></i></a>';
            linhas += '<a href="javascript:;" onclick="grid_remove(\'' + index + '\', \'' + entity + '\')" class="btn btn-danger"><i class="fas fa-trash"></i></a>';
            linhas += '</td>';
            linhas += "</tr>";

        });
    }

    tbody.html(linhas);

}

function inputHandler(masks, max, event) {
    var c = event.target;
    var v = c.value.replace(/\D/g, '');
    var m = c.value.length > max ? 1 : 0;
    VMasker(c).unMask();
    VMasker(c).maskPattern(masks[m]);
    c.value = VMasker.toPattern(v, masks[m]);
}

$(document).ready(function () {
    $(".gridTorres").each(function () {
        grid_refresh_table($(this).attr("id").replace("Data", ""));
        $(this).hide();
    });

    $("input[type=text]").each(function (key, input) {
        if (input.hasAttribute('data-format')) {
            let format = input.attributes['data-format'];
            VMasker(input).maskPattern(format.value);
        }
    });

});
