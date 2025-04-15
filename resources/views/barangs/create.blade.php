<!-- resources/views/barangs/create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto p-6 bg-white rounded-2xl shadow-md mt-10">
    <h2 class="text-2xl font-semibold text-gray-700 mb-4">Tambah Barang</h2>

    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-lg">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('barangs.store') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label class="block text-sm font-medium text-gray-600 mb-1">Nama Barang</label>
            <input type="text" name="nama_barang" class="w-full p-2 border border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200" required>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-600 mb-1">Kategori</label>
            <input type="text" name="kategori" class="w-full p-2 border border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-600 mb-1">Stok</label>
            <input type="number" name="stok" class="w-full p-2 border border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200" required>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-600 mb-1">Harga</label>
            <input type="number" name="harga" step="0.01" class="w-full p-2 border border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200" required>
        </div>

        <div class="pt-2">
            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition duration-200">
                Simpan Barang
            </button>
        </div>
    </form>
</div>
@endsection