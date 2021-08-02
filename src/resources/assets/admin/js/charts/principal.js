$(function () {
    $.ajax({
        url: '/admin/dashboard/estatisticas',
        success: function (data) {
            ligargrafico(data);
        }
    });
})

function ligargrafico(dados) {
    var statistics_chart = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(statistics_chart, {
        type: 'line',
        data: {
            labels: dados.map(function (info) { return info.label; }),
            datasets: [{
                label: 'Agendadas',
                data: dados.map(function (info) { return parseFloat(info.agendado); }),
                borderWidth: 5,
                borderColor: '#2891e1',
                backgroundColor: 'transparent',
                pointBackgroundColor: '#fff',
                pointBorderColor: '#2891e1',
                pointRadius: 4
            },
            {
                label: 'Cancelamentos',
                data: dados.map(function (info) { return parseFloat(info.cancelado); }),
                borderWidth: 5,
                borderColor: '#e54818',
                backgroundColor: 'transparent',
                pointBackgroundColor: '#fff',
                pointBorderColor: '#e54818',
                pointRadius: 4
            },
            {
                label: 'Confirmadas',
                data: dados.map(function (info) { return parseFloat(info.confirmado); }),
                borderWidth: 5,
                borderColor: '#19e582',
                backgroundColor: 'transparent',
                pointBackgroundColor: '#fff',
                pointBorderColor: '#19e582',
                pointRadius: 4
            }]
        },
        options: {
            legend: {
                display: false
            },
            scales: {
                yAxes: [{
                    gridLines: {
                        display: false,
                        drawBorder: false,
                    },
                    ticks: {
                        stepSize: 150
                    }
                }],
                xAxes: [{
                    gridLines: {
                        color: '#fbfbfb',
                        lineWidth: 2
                    }
                }]
            },
        }
    });
}
