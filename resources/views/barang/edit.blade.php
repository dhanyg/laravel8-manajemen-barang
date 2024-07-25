@extends('layouts.dashboard.main')
@section('title', 'Edit Barang - SemBarang')
@section('content')
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container">
            <h2>Barang</h2>
        </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
        <div class="container">
            @if (session('success'))
                <div class="row">
                    <div class="col-md-4">
                        <div class="alert alert-important alert-success alert-dismissible" role="alert">
                            <div class="d-flex">
                                <div>
                                    {{ session('success') }}
                                </div>
                            </div>
                            <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                        </div>
                    </div>
                </div>
            @elseif (session('error'))
                <div class="row justify-content-center">
                    <div class="col-md-4">
                        <div class="alert alert-important alert-danger alert-dismissible" role="alert">
                            <div class="d-flex">
                                <div>
                                    {{ session('error') }}
                                </div>
                            </div>
                            <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                        </div>
                    </div>
                </div>
            @endif
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="card-title">Edit Barang</div>
                            <div>
                                <a href="{{ route('barang.index') }}" class="btn btn-secondary">Kembali</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('barang.update', $barang->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <input type="hidden" name="gambar_lama" value="{{ $barang->gambar }}">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="nama_barang">Nama Barang</label>
                                            <input class="form-control @error('nama') is-invalid @enderror" type="text"
                                                name="nama" id="nama_barang" placeholder="Ketik nama barang"
                                                value="{{ old('nama', $barang->nama) }}" autofocus>
                                            @error('nama')
                                                <div class="invalid-feedback mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="kategori">Kategori</label>
                                            <select name="id_kategori"
                                                class="form-select @error('id_kategori') is-invalid @enderror"
                                                id="kategori">
                                                <option value="" disabled selected>Pilih kategori</option>
                                                @foreach ($kategori as $item)
                                                    <option value="{{ $item->id }}"
                                                        {{ old('id_kategori', $barang->id_kategori) == $item->id ? 'selected' : '' }}>
                                                        {{ $item->nama }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('id_kategori')
                                                <div class="invalid-feedback mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="deskripsi" class="form-label">Deskripsi Barang</label>
                                            <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" id="deskripsi" rows="10">{{ old('deskripsi', $barang->deskripsi) }}</textarea>
                                            @error('deskripsi')
                                                <div class="invalid-feedback mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="gambar" class="form-label">Gambar Barang</label>
                                            <input class="form-control @error('gambar') is-invalid @enderror" type="file"
                                                name="gambar" id="gambar">
                                            @error('gambar')
                                                <div class="invalid-feedback mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <img class="img-fluid" src="{{ asset('storage/' . $barang->gambar) }}"
                                                id="previewGambar" />
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer px-0">
                                    <button class="btn btn-primary" type="submit">Simpan</button>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        const file = document.querySelector("#gambar") // or document.getElementById(file)

        file.addEventListener("change", function() {

            const reader = new FileReader()

            reader.addEventListener("load", () => {
                document.querySelector("#previewGambar").src = reader.result
                document.querySelector("#previewGambar").classList.add('img-thumbnail');
            })

            reader.readAsDataURL(this.files[0])

        })
    </script>
@endpush
