/*$(function () {
    var socket = io('notification-talentuminformatica-com-br.umbler.net');
    //var socket  = io('localhost:3000');
    socket.on('connect', function (event) {
        let application = document.head.querySelector("[property=application][content]").content;
        let register = document.head.querySelector("[property=register][content]").content;
        let reference = { 'application': application, 'register': register };
        this.emit('register', reference);
    });

    //recebendo mensagem de alteração de OS.
    socket.on('message', function (data) {

        //var x = document.getElementById('soundAlert');
        //x.play();
        $("#bell-notification").addClass('beep');
        if ($('#history_log li').length > 0) {
            $('#history_log li:eq(0)').before("<li class='media'>" + data.html + "</li>");
        } else {
            $('#history_log').append("<li class='media'>" + data.html + "</li>");
        }

        if ($('#alert-list a').length > 0) {
            $('#alert-list a:eq(0)').before('<a href="#" class="dropdown-item dropdown-item-unread">' + data.html + '</a>');
        } else {
            $('#alert-list').append('<a href="#" class="dropdown-item dropdown-item-unread">' + data.html + '</a>');
        }

        $.notify('<div class="media">' + data.html + '</div>', {
            type: 'info',
            allow_dismiss: false,
            showProgressbar: true,
            placement : {
                from : 'bottom',
            }
        });
        //$("#notify_icon").addClass('has-noti');
        //$.notify('<strong>' + data.title + '</strong><br>' + data.message, { allow_dismiss: false });
        //console.log(data);
    });

    //ação ao clicar no alerta
    $("#bell-notification").on('click', function () {
        $("#bell-notification").removeClass('beep');
    })
});


function playAlert() {
    var x = document.getElementById('soundAlert');
    x.play();
}*/

