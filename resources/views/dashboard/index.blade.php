<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Sales Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .summary {
            display: flex;
            justify-content: space-around;
            margin-bottom: 20px;
        }
        .summary div {
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 5px;
            text-align: center;
            width: 30%;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        canvas {
            display: block;
            max-width: 900px;
            width: 100%;
            height: 500px;
            margin: 20px auto;
        }
    </style>
</head>
<body>
    <div>
        <h1>Sales Dashboard</h1>
        <div class="summary">
            <div>
                <h2>Total Sales</h2>
                <p>${{ number_format($totalSales, 2) }}</p>
            </div>
        </div>
        <div>
            <h2>Products Sold Per Region</h2>
            <canvas id="barChart"></canvas>
        </div>
        <div>
            <h2>Products Sold Per Month</h2>
            <canvas id="lineChart"></canvas>
        </div>
    </div>

    <script>
        const ctxBar = document.getElementById('barChart').getContext('2d');
        const barChart = new Chart(ctxBar, {
            type: 'bar',
            data: {
                labels: @json($productsPerRegion->pluck('region')),
                datasets: [{
                    label: 'Products Sold',
                    data: @json($productsPerRegion->pluck('sales_records_count')),
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        const ctxLine = document.getElementById('lineChart').getContext('2d');
        const lineChart = new Chart(ctxLine, {
            type: 'line',
            data: {
                labels: @json($salesPerMonth->pluck('month')),
                datasets: [{
                    label: 'Units Sold',
                    data: @json($salesPerMonth->pluck('total')),
                    fill: false,
                    borderColor: 'rgba(255, 99, 132, 1)',
                    tension: 0.1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>