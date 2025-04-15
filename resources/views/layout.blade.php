<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Manajemen Gudang' }}</title>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Noto Sans -->
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap" rel="stylesheet">

    <!-- Custom Font Style -->
    <style>
        body {
            font-family: 'Noto Sans', sans-serif;
        }
    </style>
</head>
<body class="bg-[#74512D]">
    <div class="min-h-screen flex items-center justify-center">
        @yield('content')
    </div>
</body>
</html>