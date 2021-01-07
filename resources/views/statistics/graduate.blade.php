@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="page-header">
        <div class="page-header-title">
            <h6>Graduate Evaluation Results</h6>
        </div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb p-0">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fas fa-home fa-fw"></i></a></li>
                <li class="breadcrumb-item" aria-current="page"><a href="">Evaluation Results</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('companies.index') }}">Graduate</a></li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-md-6 my-3">
            <div class="card">
                <div class="card-header">Τρόποι αναζήτησης εργασίας:</div>
                <div class="card-body">
                    <canvas id="question2" height="400"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6 my-3">
            <div class="card">
                <div class="card-header">Σχέση εργασίας:</div>
                <div class="card-body">
                    <canvas id="question5" height="400"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6 my-3">
            <div class="card">
                <div class="card-header">Με ποια ειδικότητα απασχολείστε;</div>
                <div class="card-body">
                    <canvas id="question7" height="400"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6 my-3">
            <div class="card">
                <div class="card-header">Η Πρακτική σας Άσκησή εκτιμήθηκε ως εμπειρία για τη θέση;</div>
                <div class="card-body">
                    <canvas id="question11" class="pie" height="400"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6 my-3">
            <div class="card">
                <div class="card-header">Μήπως στην πρώτη σας εργασία προσληφθήκατε απ’ την εταιρία στην οποία κάνατε την Πρακτική σας Άσκηση;</div>
                <div class="card-body">
                    <canvas id="question11a" class="pie" height="400"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6 my-3">
            <div class="card">
                <div class="card-header">Εκτός του πτυχίου είχατε και μεταπτυχιακό τίτλο για τη θέση;</div>
                <div class="card-body">
                    <canvas id="question12" class="pie" height="400"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6 my-3">
            <div class="card">
                <div class="card-header">Το ύψος των αμοιβών σας κυμαίνεται (καθαρές αμοιβές):</div>
                <div class="card-body">
                    <canvas id="question24" class="pie" height="400"></canvas>
                </div>
            </div>
        </div>
        <div class="col-12 my-3">
            <div class="card">
                <div class="card-header">Επιλέξτε μέχρι 5 από τα παρακάτω θεματικά αντικείμενα που διδαχθήκατε και που αποδείχθηκαν πιο ωφέλιμα κατά την εργασία σας. </div>
                <div class="card-body">
                    <canvas id="question25" height="400"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    var chart_data = @json($chart_data);
    var charts = {};

    $.each(chart_data, function(index,value) {
        var ctx = $("#"+index);
        if (ctx.hasClass("pie")) {
            charts[index] = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: value.labels,
                    datasets: [{
                        data: value.data,
                        backgroundColor: [
                            'rgb(255, 99, 132)',
                            'rgb(54, 162, 235)',
                            'rgb(255, 206, 86)',
                            'rgb(66, 189, 189)',
                            'rgb(153, 102, 255)',
                            'rgb(255, 159, 64)',
                            'rgb(204, 0, 204)',
                            'rgb(191, 64, 64)',
                            'rgb(64, 242, 120)',
                            'rgb(191, 128, 64)',
                            'rgb(230, 184, 0)',
                            'rgb(20, 125, 160)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(204, 0, 204, 1)',
                            'rgba(191, 64, 64, 1)',
                            'rgba(64, 242, 120, 1)',
                            'rgba(191, 128, 64, 1)',
                            'rgba(230, 184, 0, 1)',
                            'rgba(20, 125, 160, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        datalabels: {
                            formatter: (value, ctx) => {
                                let sum = 0;
                                let dataArr = ctx.chart.data.datasets[0].data;
                                dataArr.map(data => {
                                    sum += data;
                                });
                                let percentage = (value*100 / sum).toFixed(2)+"%";
                                return percentage;
                            },
                            color: '#fff',
                        }
                    }
                }
            });
        }
        else {
            charts[index] = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: value.labels,
                    datasets: [{
                        label: '# of Answers',
                        data: value.data,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(66, 189, 189, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(204, 0, 204, 0.2)',
                            'rgba(191, 64, 64, 0.2)',
                            'rgba(64, 242, 120, 0.2)',
                            'rgba(191, 128, 64, 0.2)',
                            'rgba(230, 184, 0, 0.2)',
                            'rgba(20, 125, 160, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(204, 0, 204, 1)',
                            'rgba(191, 64, 64, 1)',
                            'rgba(64, 242, 120, 1)',
                            'rgba(191, 128, 64, 1)',
                            'rgba(230, 184, 0, 1)',
                            'rgba(20, 125, 160, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    },
                    plugins: {
                        datalabels: {
                            formatter: (value, ctx) => {
                                let sum = 0;
                                let dataArr = ctx.chart.data.datasets[0].data;
                                dataArr.map(data => {
                                    sum += data;
                                });
                                let percentage = (value*100 / sum).toFixed(2)+"%";
                                return percentage;
                            },
                            color: '#334d4d',
                        }
                    }
                }
            });
        }
    });      
</script>
@endpush