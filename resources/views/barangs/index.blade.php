@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Barang</h2>

    @if(session('success'))
        <div style="color: green;">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('barangs.create') }}">+ Tambah Barang</a>

    <table border="1" cellpadding="10" style="margin-top: 20px;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Kategori</th>
                <th>Stok</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($barangs as $barang)
            <tr>
                <td>{{ $barang->id }}</td>
                <td>{{ $barang->nama_barang }}</td>
                <td>{{ $barang->kategori }}</td>
                <td>{{ $barang->stok }}</td>
                <td>Rp{{ number_format($barang->harga, 2, ',', '.') }}</td>
                <td>
                    <a href="{{ route('barangs.edit', $barang->id) }}">Edit</a> |
                    <form action="{{ route('barangs.destroy', $barang->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Yakin ingin hapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
