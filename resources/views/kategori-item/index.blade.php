@extends('layouts.dashboard.main')
@section('title', 'Item Kategori - SemBarang')
@section('content')
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container">
            <h2>{{ $kategori->nama }}</h2>
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
                            <a href="{{ route('kategori.index') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </div>
                    <div class="card">
                        @if (count($barang) < 1)
                            <p class="text-center mt-3">Tidak ada data barang.</p>
                        @else
                            <div class="table-responsive">
                                <table class="table table-vcenter card-table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama Barang</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($barang as $key => $row)
                                            <tr>
                                                <td>{{ $key + $barang->firstItem() }}</td>
                                                <td>{{ $row->nama }}</td>
                                                <td>
                                                    <a href="{{ route('barang.show', $row->id) }}">Detail</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                    @if (!empty($barang))
                        <div class="mt-3 d-flex justify-content-center">
                            {{ $barang->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
