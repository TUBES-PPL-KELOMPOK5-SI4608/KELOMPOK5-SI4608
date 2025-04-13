<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Inventory</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <!-- Add Noto Sans font -->
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Noto Sans', sans-serif;  /* Apply Noto Sans font */
            background-color: #FBFAF5;  /* Set background color to FBFAF5 */
        }
        .sidebar {
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #74512D;
            height: 100vh;
            color: white;
            display: flex;
            flex-direction: column;
            padding-top: 50px;  /* Added padding to move sidebar items down */
        }
        .sidebar .nav-item a {
            color: white;
        }
        .sidebar .nav-item a:hover {
            background-color: #FEBA17;
        }
        .sidebar .nav-item.active a {
            background-color: #FEBA17;
        }
        .sidebar .nav-item.profile, .sidebar .nav-item.settings, .sidebar .nav-item.logout {
            margin-top: auto; /* Push these items to the bottom of the sidebar */
        }
        .header {
            background-color: #74512D;
            color: white;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .header h1 {
            margin: 0;
            font-size: 22px;  /* Reduced font size for "Welcome" */
        }
        .header .date-time {
            font-size: 14px;
        }
        .header .notifications {
            font-size: 22px;  /* Increased icon size */
            cursor: pointer;
        }
        .main-content {
            margin-left: 250px;
            padding-top: 30px;
        }
        .card {
            background-color: #E4E0E1;
        }
        .footer {
            background-color: #74512D;
            color: white;
            text-align: center;
            padding: 10px 0;
        }
        .footer a {
            color: white;
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('dashboard') }}">
                    <i class="fas fa-tachometer-alt"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-couch"></i> Daftar Stok Furniture
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-sign-in-alt"></i> Pencatatan Masuk/Keluar
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-file-alt"></i> Laporan
                </a>
            </li>
            <!-- Spacer for visual organization -->
            <div style="flex-grow: 1;"></div> <!-- Push items below -->

            <li class="nav-item profile">
                <a class="nav-link" href="#">
                    <i class="fas fa-user"></i> Profil
                </a>
            </li>
            <li class="nav-item settings">
                <a class="nav-link" href="#">
                    <i class="fas fa-cogs"></i> Pengaturan
                </a>
            </li>
            <li class="nav-item logout">
                <a class="nav-link" href="#">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Header -->
        <div class="header">
            <h1>Welcome, John Doe</h1>
            <div>
                <span class="date-time" id="current-date-time"></span>
                <i class="fas fa-bell notifications"></i>
            </div>
        </div>

        <!-- Data Summary -->
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

    <!-- Footer -->
    <footer class="footer">
        <p>Company Name - 123 Address St, City, Country</p>
        <a href="#">Kebijakan Privasi</a> | <a href="#">Syarat dan Ketentuan</a>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Set current date and time (24-hour format)
        const currentDate = new Date();
        const day = currentDate.toLocaleString('en-GB', { weekday: 'long' });
        const date = currentDate.toLocaleString('en-GB', { day: '2-digit', month: 'long', year: 'numeric' });
        const time = currentDate.toLocaleString('en-GB', { hour: '2-digit', minute: '2-digit', hour12: false }); // 24-hour format

        const dateTimeString = `${day}, ${date}, ${time}`;
        document.getElementById('current-date-time').textContent = dateTimeString;

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

</body>
</html>