<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class BarangController extends Controller
{
    // Tampilkan semua barang + fitur search dan filter kategori
    public function index(Request $request)
    {
        $query = Barang::query();

        // Fitur pencarian nama barang
        if ($request->filled('search')) {
            $query->where('nama_barang', 'like', '%' . $request->search . '%');
        }

        // Fitur filter berdasarkan kategori
        if ($request->filled('kategori')) {
            $query->where('kategori', $request->kategori);
        }

        // Ambil semua data hasil filter/search
        $barangs = $query->get();

        // Ambil daftar kategori unik untuk dropdown filter
        $kategoriList = Barang::select('kategori')->distinct()->pluck('kategori');

        return view('barangs.index', compact('barangs', 'kategoriList'));
    }

    // Tampilkan form tambah barang
    public function create()
    {
        return view('barangs.create');
    }

    // Simpan barang baru
    public function store(Request $request)
    {
        $barangData = $request->input('barang');
    
        foreach ($barangData as $data) {
            // Validasi tiap barang
            $validated = \Validator::make($data, [
                'nama_barang' => 'required',
                'kategori' => 'nullable',
                'stok' => 'required|integer',
                'harga' => 'required|numeric',
            ])->validate();
    
            Barang::create($validated);
        }
    
        return redirect()->route('barangs.index')->with('success', 'Semua barang berhasil ditambahkan!');
    }

    // Tampilkan detail satu barang
    public function show($id)
    {
        $barang = Barang::findOrFail($id);
        return view('barangs.show', compact('barang'));
    }

    // Tampilkan form edit barang
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
        $barang->update($request->except('_token'));

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
