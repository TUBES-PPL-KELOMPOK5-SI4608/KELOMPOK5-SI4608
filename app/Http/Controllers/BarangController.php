<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class BarangController extends Controller
{
    // Tampilkan semua barang
    public function index()
    {
        $barangs = Barang::all(); // Ambil semua data barang
        return view('barangs.index', compact('barangs')); // Kirim data barang ke view
    }    

    // Tampilkan form tambah barang
    public function create()
    {
        return view('barangs.create');
    }

    // Simpan barang baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required',
            'kategori' => 'nullable',
            'stok' => 'required|integer',
            'harga' => 'required|numeric',
        ]);

        Barang::create($request->all());

        return redirect()->route('barangs.index')->with('success', 'Barang berhasil ditambahkan!');
    }

    // Tampilkan detail satu barang (opsional)
    public function show($id)
    {
        $barang = Barang::findOrFail($id);
        return view('barangs.show', compact('barang'));
    }

    // Tampilkan form edit barang
// Menampilkan form edit barang
    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        return view('barangs.edit', compact('barang'));
    }

    // Update data barang
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_barang' => 'required',
            'kategori' => 'nullable',
            'stok' => 'required|integer',
            'harga' => 'required|numeric',
        ]);

        $barang = Barang::findOrFail($id);
        $barang->update($request->all());

        return redirect()->route('barangs.index')->with('success', 'Barang berhasil diperbarui!');
    }


    // Hapus barang
    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();

        return redirect()->route('barangs.index')->with('success', 'Barang berhasil dihapus!');
    }
}
