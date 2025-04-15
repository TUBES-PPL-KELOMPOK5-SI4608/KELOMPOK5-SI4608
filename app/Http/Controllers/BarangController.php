<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        
        $barangs = Barang::when($search, function($query) use ($search) {
                    return $query->where('nama_barang', 'like', "%$search%")
                                 ->orWhere('kode_barang', 'like', "%$search%");
                })
                ->orderBy('nama_barang')
                ->paginate(10); // 10 item per halaman

        return view('barang.index', compact('barangs', 'search'));
    }
}