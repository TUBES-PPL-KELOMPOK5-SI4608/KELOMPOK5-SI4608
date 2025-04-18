@extends('layout')

@section('content')
<div class="max-w-6xl mx-auto bg-white shadow-md rounded-lg p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">Daftar Barang</h2>
        <a href="{{ route('barangs.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
            + Tambah Barang
        </a>
    </div>

    <table class="min-w-full border border-gray-300">
        <thead class="bg-gray-100">
            <tr>
                <th class="py-2 px-4 border-b">Nama</th>
                <th class="py-2 px-4 border-b">Kategori</th>
                <th class="py-2 px-4 border-b">Stok</th>
                <th class="py-2 px-4 border-b">Harga</th>
                <th class="py-2 px-4 border-b">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($barangs as $barang)
            <tr class="hover:bg-gray-50">
                <td class="py-2 px-4 border-b">{{ $barang->nama_barang }}</td>
                <td class="py-2 px-4 border-b">{{ $barang->kategori ?? '-' }}</td>
                <td class="py-2 px-4 border-b">{{ $barang->stok }}</td>
                <td class="py-2 px-4 border-b">Rp {{ number_format($barang->harga, 0, ',', '.') }}</td>
                <td class="py-2 px-4 border-b">
                    <a href="{{ route('barangs.show', $barang->id) }}" class="text-blue-600 hover:underline">Detail</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
