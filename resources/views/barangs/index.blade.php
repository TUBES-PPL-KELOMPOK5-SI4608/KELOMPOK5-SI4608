@extends('layouts.main')

@section('content')
<div class="max-w-6xl mx-auto px-6 py-8">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-3xl font-bold text-gray-800">Daftar Barang</h2>
        <a href="{{ route('barangs.create') }}" class="bg-green-600 hover:bg-green-700 text-white px-5 py-2 rounded-md shadow">
            + Tambah Barang
        </a>
    </div>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    @if (session('success'))
        <div class="mb-4 bg-green-100 text-green-800 p-3 rounded-lg shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('barangs.index') }}" method="GET" class="mb-6 flex flex-col sm:flex-row gap-3 items-start sm:items-center">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama barang..." class="w-full sm:w-1/2 px-4 py-2 border rounded-md shadow-sm">

        <select name="kategori" class="w-full sm:w-1/4 px-4 py-2 border rounded-md shadow-sm">
            <option value="">Semua Kategori</option>
            @foreach ($kategoriList as $kategori)
                <option value="{{ $kategori }}" {{ request('kategori') == $kategori ? 'selected' : '' }}>
                    {{ $kategori }}
                </option>
            @endforeach
        </select>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            🔍 Cari
        </button>
    </form>

    @if(request('search') || request('kategori'))
        <div class="mb-4 text-sm text-gray-600">
            Menampilkan hasil untuk:
            @if(request('search'))
                <strong>Nama</strong>: "{{ request('search') }}"
            @endif
            @if(request('kategori'))
                <strong>Kategori</strong>: "{{ request('kategori') }}"
            @endif
        </div>
    @endif

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @foreach ($barangs as $barang)
            <div class="bg-white border border-gray-200 rounded-xl p-4 shadow-sm hover:shadow-md transition">
                <h3 class="text-xl font-semibold text-blue-700">{{ $barang->nama_barang }}</h3>
                <p class="text-sm text-gray-500 mt-1 mb-3">Kategori: {{ $barang->kategori ?? '-' }}</p>

                <div class="text-sm text-gray-600 mb-2">
                    <p><strong>Stok:</strong> {{ $barang->stok }}</p>
                    <p><strong>Harga:</strong> Rp{{ number_format($barang->harga, 2, ',', '.') }}</p>
                </div>

                <div class="flex justify-between mt-4">
                    <a href="{{ route('barangs.edit', $barang->id) }}" class="text-sm bg-yellow-400 text-white px-3 py-1 rounded hover:bg-yellow-500">
                        ✏️ Edit
                    </a>
                    <form data-barang-id="{{ $barang->id }}" class="form-hapus-barang">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn-hapus text-sm bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                            🗑️ Hapus
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</div>
<!-- Modal Konfirmasi -->
<div id="modal-konfirmasi" class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50 hidden">
    <div class="bg-white p-6 rounded-lg shadow-lg max-w-sm w-full">
        <h2 class="text-lg font-semibold text-gray-800 mb-4">Konfirmasi Penghapusan</h2>
        <p class="text-gray-600 mb-6">Apakah Anda yakin ingin menghapus barang ini?</p>
        <div class="flex justify-end gap-3">
            <button id="batal-btn" class="px-4 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-400">Batal</button>
            <form id="form-konfirmasi" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">Hapus</button>
            </form>
        </div>
    </div>
</div>
<script>
    const modal = document.getElementById('modal-konfirmasi');
    const formKonfirmasi = document.getElementById('form-konfirmasi');
    const batalBtn = document.getElementById('batal-btn');

    document.querySelectorAll('.btn-hapus').forEach(button => {
        button.addEventListener('click', function () {
            const form = this.closest('.form-hapus-barang');
            const action = form.getAttribute('action') || `/barangs/${form.dataset.barangId}`;
            formKonfirmasi.setAttribute('action', action);
            modal.classList.remove('hidden');
        });
    });

    batalBtn.addEventListener('click', () => {
        modal.classList.add('hidden');
        formKonfirmasi.setAttribute('action', '');
    });
</script>
@endsection
