@extends('layouts.dashboard.main')
@section('title', 'Kategori - SemBarang')
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
                <div class="row">
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
                            <a href="{{ route('kategori.create') }}" class="btn btn-primary">Tambah
                                Data</a>
                        </div>
                    </div>
                    <div class="card">
                        @if (count($kategori) < 1)
                            <p class="text-center mt-3">Tidak ada data kategori.</p>
                        @else
                            <div class="table-responsive">
                                <table class="table table-vcenter card-table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama Kategori</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($kategori as $key => $row)
                                            <tr>
                                                <td>{{ $key + $kategori->firstItem() }}</td>
                                                <td>
                                                    <a
                                                        href="{{ route('kategori.item.index', $row->id) }}">{{ $row->nama }}</a>
                                                </td>
                                                <td>
                                                    <a href="{{ route('kategori.edit', $row->id) }}">Edit</a>
                                                    <span>|</span>
                                                    <a class="btn-hapus" href="#" data-id="{{ $row->id }}"
                                                        data-bs-toggle="modal" data-bs-target="#hapusKategori">
                                                        <form class="d-inline-block"
                                                            action="{{ route('kategori.destroy', $row->id) }}"
                                                            method="post">Hapus
                                                            @csrf
                                                            @method('delete')
                                                        </form>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                    @if (!empty($kategori))
                        <div class="mt-3 d-flex justify-content-center">
                            {{ $kategori->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="modal modal-blur fade" id="hapusKategori" tabindex="-1" aria-hidden="true">
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
                let hapusKategori = $(this).children()[0];
                $('#konfirmasiHapus').on('click', function() {
                    hapusKategori.submit();
                })
            });
        });
    </script>
@endpush
