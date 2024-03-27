<canvas id="topDishesChart" width="300" height="300"></canvas>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('topDishesChart').getContext('2d');
    var topDishesChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: {!! json_encode(array_keys($topDishesDetails)) !!},
            datasets: [{
                label: 'Piatti più ordinati',
                data: {!! json_encode(array_values($topDishesDetails)) !!},
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
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
