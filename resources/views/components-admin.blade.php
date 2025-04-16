<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Manajemen Gudang' }}</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Noto Sans -->
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Noto Sans', sans-serif;
        }
    </style>
</head>
<body class="bg-[#FBFAF5] text-gray-800">

    <div class="flex min-h-screen">

        <!-- Sidebar -->
        <aside class="w-64 bg-[#74512D] text-white flex flex-col p-4">
            <div class="mb-10">
                <h2 class="text-xl font-bold">WareHub</h2>
            </div>
            <nav class="space-y-2">
                <a href="{{ route('dashboard-admin') }}" class="block py-2 px-4 rounded hover:bg-[#FEBA17] {{ request()->is('dashboard-admin') ? 'bg-[#FEBA17]' : '' }}">
                    🏠 Dashboard
                </a>
                <a href="#" class="block py-2 px-4 rounded hover:bg-[#FEBA17]">
                    🔄 Pencatatan Keluar/Masuk
                </a>
                <a href="#" class="block py-2 px-4 rounded hover:bg-[#FEBA17]">
                    🔄 Kelola Data Furniture
                </a>
                <a href="#" class="block py-2 px-4 rounded hover:bg-[#FEBA17] {{ request()->is('barangs*') ? 'bg-[#FEBA17]' : '' }}">
                    📦 Daftar Furniture
                </a>
                <a href="#" class="block py-2 px-4 rounded hover:bg-[#FEBA17]">
                🛠️ Pencatatan Kerusakan
                </a>
                <a href="#" class="block py-2 px-4 rounded hover:bg-[#FEBA17]">
                    🔔 Notifikasi
                </a>
                <a href="#" class="block py-2 px-4 rounded hover:bg-[#FEBA17]">
                    🕘 Riwayat Perubahan
                </a>
                <a href="#" class="block py-2 px-4 rounded hover:bg-[#FEBA17]">
                    📉 Batas Stok Minimum
                </a>
                <a href="#" class="block py-2 px-4 rounded hover:bg-[#FEBA17]">
                    🏭 Data Supplier
                </a>
            </nav>

            <div class="space-y-2 pt-10 border-t border-white/30">
                <a href="#" class="block py-2 px-4 rounded hover:bg-[#FEBA17]">
                    ⚙️ Pengaturan
                </a>
                <a href="{{ route('logout') }}" class="block py-2 px-4 rounded hover:bg-[#FEBA17]">
                    🚪 Logout
                </a>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col">

            <!-- Header -->
            <header class="bg-[#74512D] text-white px-6 py-4 shadow flex justify-between items-center">
                <h1 class="text-lg font-semibold">Halo, {{ Auth::user()->name ?? 'Pengguna' }}</h1>
                <div class="space-x-5">
                    <i class="fas fa-bell notifications"></i>
                    <span id="current-date-time" class="text-sm"></span>
                </div>
            </header>

            <!-- Page Content -->
            <main class="p-6">
                @yield('content')
            </main>

            <!-- Footer (Opsional) -->
            <!-- <footer class="bg-[#74512D] text-white text-center p-2">
                <small>&copy; {{ date('Y') }} GudangApp - All rights reserved.</small>
            </footer> -->
        </div>

    </div>

    <!-- Script Waktu -->
    <script>
    function updateTime() {
        const now = new Date();
        const options = {
            weekday: 'long',
            year: 'numeric',
            month: 'long',
            day: 'numeric',
            hour: '2-digit',
            minute: '2-digit',
            second: '2-digit'
        };
        document.getElementById('current-date-time').textContent = now.toLocaleDateString('id-ID', options);
    }

    // Jalankan pertama kali
    updateTime();

    // Update setiap detik
    setInterval(updateTime, 1000);
    </script>

</body>
</html>
