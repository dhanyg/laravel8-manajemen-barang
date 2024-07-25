<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriItemController extends Controller
{
    public function index(Kategori $kategori)
    {
        $barang = Barang::without('kategori')
            ->select('id', 'nama')
            ->where('id_kategori', $kategori->id)->orderBy('nama')
            ->paginate(10);
        return view('kategori-item.index', compact('kategori', 'barang'));
    }
}
