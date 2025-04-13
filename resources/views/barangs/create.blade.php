@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Barang</h2>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('barangs.store') }}" method="POST">
        @csrf
        <div>
            <label>Nama Barang:</label>
            <input type="text" name="nama_barang" required>
        </div>
        <div>
            <label>Kategori:</label>
            <input type="text" name="kategori">
        </div>
        <div>
            <label>Stok:</label>
            <input type="number" name="stok" required>
        </div>
        <div>
            <label>Harga:</label>
            <input type="number" step="0.01" name="harga" required>
        </div>
        <button type="submit">Simpan</button>
    </form>

    <a href="{{ route('barangs.index') }}">Kembali</a>
</div>
@endsection
