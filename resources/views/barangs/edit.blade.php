@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Barang</h2>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('barangs.update', $barang->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Menandakan permintaan PUT untuk update data -->
        
        <div>
            <label>Nama Barang:</label>
            <input type="text" name="nama_barang" value="{{ old('nama_barang', $barang->nama_barang) }}" required>
        </div>
        <div>
            <label>Kategori:</label>
            <input type="text" name="kategori" value="{{ old('kategori', $barang->kategori) }}">
        </div>
        <div>
            <label>Stok:</label>
            <input type="number" name="stok" value="{{ old('stok', $barang->stok) }}" required>
        </div>
        <div>
            <label>Harga:</label>
            <input type="number" step="0.01" name="harga" value="{{ old('harga', $barang->harga) }}" required>
        </div>
        <button type="submit">Simpan Perubahan</button>
    </form>

    <a href="{{ route('barangs.index') }}">Kembali</a>
</div>
@endsection
