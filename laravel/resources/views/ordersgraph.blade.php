@extends('layouts.app')
@section('content')
<div class="card">
<h1 class="text-center p-3">Ecco i tuo ordini, divisi per mese:</h1>
<div>
<canvas class="p-2" id="monthlyStats" width="800" height="800"></canvas>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('monthlyStats').getContext('2d');
    var topDishesChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: {!! json_encode(array_keys($monthlyStats)) !!},
            datasets: [{
                label: 'Ordini mensili:',
                data: {!! json_encode(array_values($monthlyStats)) !!},
                backgroundColor: [
                    'rgba(255, 99, 132, 0.5)',
                    'rgba(54, 162, 235, 0.5)',
                    'rgba(255, 206, 86, 0.5)',
                    'rgba(75, 192, 192, 0.5)',
                    'rgba(153, 102, 255, 0.5)',
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            width: 300,
            height: 300,
        }
    });
</script>
@endsection
