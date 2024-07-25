@extends('layouts.dashboard.main')
@section('title', 'Detail Barang - SemBarang')
@section('content')
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container">
            <h2>Detail Barang</h2>
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
                    <div class="mb-2 row justify-content-between">
                        <div class="col-md-6">
                            <a href="{{ route('barang.index') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                        <div class="col-md-6">
                            <div class="float-end">
                                <a href="{{ route('barang.edit', $barang->id) }}" class="btn btn-primary">Edit</a>
                                <a href="#" class="btn btn-danger btn-hapus" data-bs-toggle="modal"
                                    data-bs-target="#hapusBarang">
                                    <form class="d-inline-block" action="{{ route('barang.destroy', $barang->id) }}"
                                        method="post">
                                        Hapus
                                        @csrf
                                        @method('delete')
                                    </form>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <img class="img-fluid img-thumbnail" src="{{ asset('storage/' . $barang->gambar) }}"
                                alt="{{ $barang->nama }}" style="bject-fit: cover">
                        </div>
                        <div class="col-md-8">
                            <div class="card p-5">
                                <h2 class="fs-1">{{ $barang->nama }}</h2>
                                <div>
                                    <a href="{{ route('kategori.item.index', $barang->id_kategori) }}"
                                        class="btn btn-sm btn-info rounded-pill px-3 py-1">{{ $barang->kategori->nama }}</a>
                                </div>
                                <div class="mt-3">
                                    <span class="fs-2 fw-bold">Deskripsi:</span>
                                    <p class="mt-1 fs-3 text-secondary">{{ $barang->deskripsi }}</p>
                                </div>
                                <div class="mt-3 text-secondary">
                                    <hr>
                                    <span>Ditambahkan oleh: {{ $barang->penginput }}</span>
                                    <span>|</span>
                                    <span>Disunting oleh:
                                        {{ $barang->disunting_oleh == '' ? '-' : $barang->penyunting }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal modal-blur fade" id="hapusBarang" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-status bg-danger"></div>
                <div class="modal-body text-center py-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="icon mb-2 text-danger icon-lg">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M12 9v4"></path>
                        <path
                            d="M10.363 3.591l-8.106 13.534a1.914 1.914 0 0 0 1.636 2.871h16.214a1.914 1.914 0 0 0 1.636 -2.87l-8.106 -13.536a1.914 1.914 0 0 0 -3.274 0z">
                        </path>
                        <path d="M12 16h.01"></path>
                    </svg>
                    <h3>Anda akan menghapus data!</h3>
                    <div class="text-secondary">Apakah Anda yakin ingin menghapus data yang dipilih? Data yang telah
                        dihapus tidak dapat dikembalikan lagi.</div>
                </div>
                <div class="modal-footer">
                    <div class="w-100">
                        <div class="row">
                            <div class="col"><a href="#" class="btn w-100" data-bs-dismiss="modal">
                                    Batal
                                </a></div>
                            <div class="col"><button id="konfirmasiHapus" type="submit" class="btn btn-danger w-100">
                                    Hapus
                                </button></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        const btnHapus = $('.btn-hapus');

        btnHapus.each(function() {
            $(this).on('click', function() {
                let hapusBarang = $(this).children()[0];
                $('#konfirmasiHapus').on('click', function() {
                    hapusBarang.submit();
                })
            });
        });
    </script>
@endpush
