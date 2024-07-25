<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\BarangRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BarangController extends Controller
{
    public function index()
    {
        $barang = Barang::with('kategori:id,nama')->select('id', 'nama', 'id_kategori')->orderBy('nama')->paginate(10);
        return view('barang.index', compact('barang'));
    }

    public function create()
    {
        $kategori = Kategori::without('barang')->orderBy('nama')->get();
        return view('barang.create', compact('kategori'));
    }

    public function store(BarangRequest $request)
    {
        $this->middleware('auth');
        $dataGambar = $request->file('gambar');
        $ekstensiFile = $dataGambar ? $dataGambar->extension() : 'jpg';
        $namaGambar = $dataGambar ? Str::slug($request->nama) . '.' . $ekstensiFile : 'nopicture' . '.' . $ekstensiFile;

        DB::beginTransaction();
        $data = $request->validated();
        $data['gambar'] = $namaGambar;
        $data['penginput'] = Auth::user()->nama;
        $data['penyunting'] = '';

        /** Simpan data ke dalam database. */
        Barang::create($data);

        if ($dataGambar) {
            /** Proses upload gambar. */
            $prosesUpload = $dataGambar->storeAs('public', $namaGambar);

            /** Jika gagal, maka batalkan transaksi database. */
            if (!$prosesUpload) {
                DB::rollback();
            }
        }

        DB::commit();

        return redirect()->route('barang.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function show(Barang $barang)
    {
        return view('barang.show', compact('barang'));
    }

    public function edit(Barang $barang)
    {
        $kategori = Kategori::without('barang')->orderBy('nama')->get();
        return view('barang.edit', compact('barang', 'kategori'));
    }

    public function update(BarangRequest $request, Barang $barang)
    {
        $this->middleware('auth');
        $dataGambar = $request->file('gambar');
        $ekstensiFile = $dataGambar ? $dataGambar->extension() : 'jpg';
        $namaGambar = $dataGambar ? Str::slug($request->nama) . '.' . $ekstensiFile : 'nopicture' . '.' . $ekstensiFile;

        DB::beginTransaction();
        $data = $request->validated();
        if ($dataGambar) {
            $data['gambar'] = $namaGambar;
        }
        $data['disunting_oleh'] = Auth::user()->nama;

        /** Update data ke database. */
        $barang->update($data);

        if ($dataGambar) {
            /** Proses upload gambar. */
            $prosesUpload = $dataGambar->storeAs('public', $namaGambar);

            /** Jika gagal, maka batalkan transaksi database. */
            if (!$prosesUpload) {
                DB::rollback();
            }

            /** Proses upload gambar. */
            $prosesHapusGambarLama = $request->gambar_lama == 'nopicture.jpg' ? true : Storage::delete('storage/' . $request->gambar_lama);

            /** Jika gagal, maka batalkan transaksi database. */
            if (!$prosesHapusGambarLama) {
                DB::rollback();
            }
        }

        DB::commit();

        return redirect()->route('barang.index')->with('success', 'Data berhasil diubah');
    }

    public function destroy(Barang $barang)
    {
        DB::beginTransaction();
        $barang->delete();
        if ($barang->gambar != 'nopicture.jpg') {
            $prosesHapusGambar = Storage::delete('public/' . $barang->gambar);
            if (!$prosesHapusGambar) {
                DB::rollback();
            }
        }
        DB::commit();
        return redirect()->route('barang.index')->with('success', 'Data berhasil dihapus');
    }
}
