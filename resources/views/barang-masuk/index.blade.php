@extends('layout')
@extends('components-admin')

@section('content')
<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="bg-white shadow-md rounded-lg p-6 mt-6">
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-xl font-semibold text-gray-800">Daftar Barang Masuk</h2>
            <a href="{{ route('barang-masuk.create') }}"
               class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                + Tambah Barang Masuk
            </a>
        </div>

        @if (session('success'))
            <div class="mb-4 text-green-600">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 text-sm text-left">
                <thead class="bg-gray-100 text-gray-700">
                    <tr>
                        <th class="px-4 py-2">#</th>
                        <th class="px-4 py-2">Nama Barang</th>
                        <th class="px-4 py-2">Tanggal Masuk</th>
                        <th class="px-4 py-2">Jumlah Masuk</th>
                        <th class="px-4 py-2">Harga Beli</th>
                        <th class="px-4 py-2">Nomor Faktur</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse ($barangMasuk as $index => $item)
                        <tr>
                            <td class="px-4 py-2">{{ $index + 1 }}</td>
                            <td class="px-4 py-2">{{ $item->barang->nama ?? '-' }}</td>
                            <td class="px-4 py-2">{{ \Carbon\Carbon::parse($item->tanggal_masuk)->format('d M Y') }}</td>
                            <td class="px-4 py-2">{{ $item->jumlah_masuk }}</td>
                            <td class="px-4 py-2">Rp {{ number_format($item->harga_beli, 0, ',', '.') }}</td>
                            <td class="px-4 py-2">{{ $item->nomor_faktur ?? '-' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-4 py-4 text-center text-gray-500">Belum ada data barang masuk.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
