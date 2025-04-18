@extends('layouts.main')

@section('content')
<div class="max-w-3xl mx-auto px-6 py-10">
    <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200">
        <h2 class="text-2xl font-bold text-[#74512D] mb-6">Edit Barang</h2>

        @if ($errors->any())
            <div class="mb-4 bg-red-100 text-red-700 p-4 rounded">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('barangs.update', $barang->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block mb-1 text-sm font-medium text-gray-700">Nama Barang:</label>
                    <input type="text" name="nama_barang" value="{{ old('nama_barang', $barang->nama_barang) }}" class="w-full border rounded px-3 py-2" required>
                </div>
                <div>
                    <label class="block mb-1 text-sm font-medium text-gray-700">Kategori:</label>
                    <input type="text" name="kategori" value="{{ old('kategori', $barang->kategori) }}" class="w-full border rounded px-3 py-2">
                </div>
                <div>
                    <label class="block mb-1 text-sm font-medium text-gray-700">Stok:</label>
                    <input type="number" name="stok" value="{{ old('stok', $barang->stok) }}" class="w-full border rounded px-3 py-2" required>
                </div>
                <div>
                    <label class="block mb-1 text-sm font-medium text-gray-700">Harga:</label>
                    <input type="number" step="0.01" name="harga" value="{{ old('harga', $barang->harga) }}" class="w-full border rounded px-3 py-2" required>
                </div>
            </div>

            <div class="mt-8 flex gap-4">
                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded text-lg font-semibold shadow-md">
                    Simpan Perubahan
                </button>
                <a href="{{ route('barangs.index') }}" class="inline-block bg-gray-200 hover:bg-gray-300 text-gray-800 px-6 py-2 rounded text-lg font-medium shadow">
                    Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
