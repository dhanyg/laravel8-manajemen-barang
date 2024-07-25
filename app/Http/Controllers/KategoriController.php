<?php

namespace App\Http\Controllers;

use App\Http\Requests\KategoriRequest;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::without('barang')->orderBy('nama')->paginate(10);
        return view('kategori.index', compact('kategori'));
    }

    public function create()
    {
        return view('kategori.create');
    }

    public function store(KategoriRequest $request)
    {
        $kategori = Kategori::create(['nama' => $request->nama_kategori]);
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil ditambahkan');
    }

    public function edit(Kategori $kategori)
    {
        return view('kategori.edit', compact('kategori'));
    }

    public function update(KategoriRequest $request, Kategori $kategori)
    {
        $kategori->update(['nama' => $request->nama_kategori]);
        return redirect()->route('kategori.index')->with('success', 'Nama kategori berhasil diubah');
    }

    public function destroy(Kategori $kategori)
    {
        try {
            $kategori->delete();
        } catch (\Exception $e) {
            return redirect()->route('kategori.index')->with('error', 'Kategori tidak dapat dihapus karena masih terdapat barang yang menggunakannya.');
        }
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus');
    }
}
