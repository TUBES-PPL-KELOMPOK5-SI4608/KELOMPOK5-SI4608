@extends('layout')
@extends('components-admin')

@section('content')
<div class="bg-white p-8 rounded-lg shadow-md max-w-5xl mx-auto">
    <h2 class="text-2xl font-semibold mb-6">Form Barang Masuk</h2>

    <form action="{{ route('barang-masuk.index') }}" method="POST">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Pilih Barang -->
            <div>
                <label for="barang_id" class="block text-sm font-medium text-gray-700">Nama Barang</label>
                <input type="text" name="nama_barang" id="nomor_faktur" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                <!-- <select name="barang_id" id="barang_id" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                    <option value="">Pilih Barang</option>
                    @foreach($barangs as $barang)
                        <option value="{{ $barang->id }}">{{ $barang->nama }}</option>
                    @endforeach
                </select> -->
            </div>

            <!-- Tanggal Masuk -->
            <div>
                <label for="tanggal_masuk" class="block text-sm font-medium text-gray-700">Tanggal Masuk</label>
                <input type="date" name="tanggal_masuk" id="tanggal_masuk" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
            </div>

            <!-- Jumlah Masuk -->
            <div>
                <label for="jumlah_masuk" class="block text-sm font-medium text-gray-700">Jumlah Masuk</label>
                <input type="number" name="jumlah_masuk" id="jumlah_masuk" min="1" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
            </div>

            <!-- Harga Beli -->
            <div>
                <label for="harga_beli" class="block text-sm font-medium text-gray-700">Harga Beli per Unit (Rp)</label>
                <input type="number" name="harga_beli" id="harga_beli" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
            </div>

            <!-- Nomor Faktur -->
            <div class="col-span-1 md:col-span-2">
                <label for="nomor_faktur" class="block text-sm font-medium text-gray-700">Nomor Faktur (Opsional)</label>
                <input type="text" name="nomor_faktur" id="nomor_faktur" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
            </div>
        </div>

        <!-- Submit Button -->
        <div class="mt-6">
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">Simpan</button>
            <a href="{{ route('barang-masuk.index') }}" class="ml-3 text-gray-600 hover:underline">Batal</a>
        </div>
    </form>
</div>
@endsection
