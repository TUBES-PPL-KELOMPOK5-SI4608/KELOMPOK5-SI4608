@extends('layout')

@section('content')
    <div class="p-4">
        <h1 class="text-xl font-semibold mb-4">Data Barang Masuk</h1>

        <a href="{{ route('barang-masuk.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">Tambah</a>

        <table class="table-auto w-full mt-4 bg-white rounded shadow">
            <thead class="bg-gray-200">
                <tr>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Tanggal</th>
                    <th>Faktur</th>
                    <th>Harga Beli</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($barangMasuk as $item)
                    <tr>
                        <td>{{ $item->barang->nama_barang }}</td>
                        <td>{{ $item->jumlah_masuk }}</td>
                        <td>{{ $item->tanggal_masuk }}</td>
                        <td>{{ $item->nomor_faktur }}</td>
                        <td>Rp{{ number_format($item->harga_beli, 0, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
