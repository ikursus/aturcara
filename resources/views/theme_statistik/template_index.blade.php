@extends('layouts/app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Statistik Peserta Berdasarkan Kursus</div>

                <div class="card-body">

                    <canvas id="statistik"></canvas>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('script')
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

<script>
var ctx = document.getElementById('statistik').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'bar',

    // The data for our dataset
    data: {
        labels: {!! json_encode($labels) !!},
        datasets: [{
            label: 'Statistik Peserta Berdasarkan Program',
            backgroundColor: {!! json_encode($bgcolor) !!},
            borderColor: {!! json_encode($bgcolor) !!},
            data: {!! json_encode($data) !!}
        }]
    },

    // Configuration options go here
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>

@endsection