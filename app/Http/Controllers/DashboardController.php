<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBarang = Barang::without('kategori')->count();
        $totalKategori = Kategori::without('barang')->count();
        return view('dashboard', compact('totalBarang', 'totalKategori'));
    }
}
