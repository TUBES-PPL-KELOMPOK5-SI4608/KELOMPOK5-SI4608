@extends('components-admin')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Inventory nibos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <!-- Add Noto Sans font -->
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
        @section('content')
        <div class="container mt-5">
            <h3>Data Summary</h3>
            <div class="row">
                <div class="col-md-3">
                    <div class="card p-3">
                        <div class="card-header">Total Furniture</div>
                        <div class="card-body">200</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card p-3">
                        <div class="card-header">Furniture Tersedia</div>
                        <div class="card-body">150</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card p-3">
                        <div class="card-header">Furniture Habis (Low Stock)</div>
                        <div class="card-body">10</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card p-3">
                        <div class="card-header">Furniture Baru Masuk</div>
                        <div class="card-body">50</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Stock Movement Chart -->
        <div class="container mt-5">
            <h3>Grafik Pergerakan Stok</h3>
            <canvas id="stockMovementChart" width="400" height="200"></canvas>
        </div>

        <!-- Stock per Category Chart -->
        <div class="container mt-5">
            <h3>Grafik Stok per Kategori</h3>
            <canvas id="stockCategoryChart" width="400" height="200"></canvas>
        </div>

        <!-- Sales Trend Chart -->
        <div class="container mt-5">
            <h3>Grafik Trend Penjualan</h3>
            <canvas id="salesTrendChart" width="400" height="200"></canvas>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>

        var stockMovementChart = new Chart(document.getElementById('stockMovementChart').getContext('2d'), {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [{
                    label: 'Stock In',
                    data: [10, 15, 25, 35, 45, 50],
                    borderColor: 'rgba(54, 162, 235, 1)',
                    fill: false
                }, {
                    label: 'Stock Out',
                    data: [5, 10, 15, 20, 25, 30],
                    borderColor: 'rgba(255, 99, 132, 1)',
                    fill: false
                }]
            }
        });

        var stockCategoryChart = new Chart(document.getElementById('stockCategoryChart').getContext('2d'), {
            type: 'bar',
            data: {
                labels: ['Meja', 'Kursi', 'Sofa', 'Rak', 'Lemari'],
                datasets: [{
                    label: 'Stock per Category',
                    data: [50, 30, 80, 20, 40],
                    backgroundColor: ['rgba(54, 162, 235, 0.2)', 'rgba(75, 192, 192, 0.2)', 'rgba(153, 102, 255, 0.2)', 'rgba(255, 159, 64, 0.2)', 'rgba(255, 99, 132, 0.2)'],
                    borderColor: ['rgba(54, 162, 235, 1)', 'rgba(75, 192, 192, 1)', 'rgba(153, 102, 255, 1)', 'rgba(255, 159, 64, 1)', 'rgba(255, 99, 132, 1)'],
                    borderWidth: 1
                }]
            }
        });

        var salesTrendChart = new Chart(document.getElementById('salesTrendChart').getContext('2d'), {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [{
                    label: 'Sales Trend',
                    data: [5, 10, 15, 20, 25, 30],
                    borderColor: 'rgba(75, 192, 192, 1)',
                    fill: false
                }]
            }
        });
    </script>
    @endsection

</body>
</html>