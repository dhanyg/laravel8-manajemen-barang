@extends('layouts.dashboard.main')
@section('title', 'Tambah Kategori - SemBarang')
@section('content')
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container">
            <h2>Kategori</h2>
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
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="card-title">Edit Kategori</div>
                            <div>
                                <a href="{{ route('kategori.index') }}" class="btn btn-secondary">Kembali</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('kategori.update', $kategori->id) }}" method="post">
                                @csrf
                                @method('put')
                                <div class="mb-3">
                                    <label class="form-label" for="nama-kategori">Nama Kategori</label>
                                    <input class="form-control @error('nama_kategori') is-invalid @enderror" type="text"
                                        name="nama_kategori" id="nama-kategori" placeholder="Ketik nama kategori" autofocus
                                        value="{{ old('nama_kategori', $kategori->nama) }}">
                                    @error('nama_kategori')
                                        <div class="invalid-feedback mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
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
