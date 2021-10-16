$(function () {
    $.ajax({
        url: '/admin/dashboard/profileestatisticas/' + $("#user_id").val(),
        success: function (data) {
            ligargrafico(data);
        }
    });
});

function ligargrafico(dados) {

    var ctx = document.getElementById("myChart2").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: dados.map(function (info) { return info.label; }),
            datasets: [{
                label: 'Agendadas',
                data: dados.map(function (info) { return parseFloat(info.agendado); }),
                borderWidth: 2,
                backgroundColor: '#6777ef',
                borderColor: '#6777ef',
                borderWidth: 2.5,
                pointBackgroundColor: '#ffffff',
                pointRadius: 4,

            },
            {
                label: 'Confirmadas',
                data: dados.map(function (info) { return parseFloat(info.confirmado); }),
                borderWidth: 2,
                backgroundColor: '#19e582',
                borderColor: '#19e582',
                borderWidth: 2.5,
                pointBackgroundColor: '#ffffff',
                pointRadius: 4
            },
            {
                label: 'Cancelamentos',
                data: dados.map(function (info) { return parseFloat(info.cancelado); }),
                borderWidth: 2,
                backgroundColor: '#e54818',
                borderColor: '#e54818',
                borderWidth: 2.5,
                pointBackgroundColor: '#ffffff',
                pointRadius: 4
            }]
        },
        options: {
            legend: {
                display: true
            },
            scales: {
                yAxes: [{
                    gridLines: {
                        drawBorder: false,
                        color: '#f2f2f2',
                    },
                    ticks: {
                        beginAtZero: true,
                        stepSize: 150
                    }
                }],
                xAxes: [{
                    ticks: {
                        display: true
                    },
                    gridLines: {
                        display: false
                    }
                }]
            },
        }
    });
}
