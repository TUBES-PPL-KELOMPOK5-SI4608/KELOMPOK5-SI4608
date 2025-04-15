<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Stok</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .table-hover tbody tr:hover {
            background-color: rgba(0, 0, 0, 0.02);
        }
        .badge-stock {
            font-size: 0.85rem;
            padding: 5px 10px;
            border-radius: 50px;
        }
    </style>
</head>
<body>
    <div class="container py-4">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">
                        <i class="fas fa-boxes me-2"></i>Daftar Stok Barang
                    </h5>
                    <span class="badge bg-light text-dark">
                        <i class="fas fa-database me-1"></i>
                        Total: {{ $barangs->total() }}
                    </span>
                </div>
            </div>
            
            <div class="card-body">
                <!-- Search Form -->
                <form action="{{ url('/barang') }}" method="GET" class="mb-4">
                    <div class="input-group">
                        <input type="text" 
                               name="search" 
                               class="form-control" 
                               placeholder="Cari barang..." 
                               value="{{ $search }}">
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>

                <!-- Table -->
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="table-light">
                            <tr>
                                <th>Kode</th>
                                <th>Nama Barang</th>
                                <th class="text-end">Stok</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($barangs as $barang)
                            <tr>
                                <td>{{ $barang->kode_barang }}</td>
                                <td>{{ $barang->nama_barang }}</td>
                                <td class="text-end">
                                    <span class="badge-stock 
                                        {{ $barang->stok > 10 ? 'bg-success' : 
                                          ($barang->stok > 0 ? 'bg-warning text-dark' : 'bg-danger') }}">
                                        {{ $barang->stok }}
                                    </span>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="text-center">Tidak ada data</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="d-flex justify-content-between mt-3">
                    <div>
                        Menampilkan {{ $barangs->firstItem() }} - {{ $barangs->lastItem() }} dari {{ $barangs->total() }}
                    </div>
                    <nav>
                        {{ $barangs->withQueryString()->links() }}
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>