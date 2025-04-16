<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BarangMasuk;

class BarangMasukController extends Controller
{
        public function index()
    {
        $barangMasuk = BarangMasuk::with('barang')->latest()->get();
        return view('barang-masuk.index', compact('barangMasuk'));
    }

    public function create()
    {
        $barangs = Barang::all();
        return view('barang-masuk.create', compact('barangs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required|exists:barangs,id',
            'jumlah_masuk' => 'required|integer',
            'tanggal_masuk' => 'required|date',
            'nomor_faktur' => 'nullable|string',
            'harga_beli' => 'nullable|numeric',
        ]);

        BarangMasuk::create($request->all());

        // Optional: Tambahkan stok ke barang utama
        $barang = Barang::find($request->barang_id);
        $barang->stok += $request->jumlah_masuk;
        $barang->save();

        return redirect()->route('barang-masuk.index')->with('success', 'Data barang masuk berhasil disimpan.');
    }

}
