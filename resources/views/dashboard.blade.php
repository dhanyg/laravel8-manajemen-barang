@extends('layouts.dashboard.main')
@section('title', 'Beranda - SemBarang')
@section('content')
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <h2>Beranda</h2>
        </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="card card-sm">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-auto">
                                    <span class="bg-primary text-white avatar fs-1">{{ $totalBarang }}</span>
                                </div>
                                <div class="col">
                                    <p class="fs-3 mb-0"><strong>Total Barang</strong></p>
                                    <a href="{{ route('barang.index') }}" class="text-secondary fs-5">Lihat
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-right">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M5 12l14 0" />
                                            <path d="M13 18l6 -6" />
                                            <path d="M13 6l6 6" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-sm">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-auto">
                                    <span class="bg-success text-white avatar fs-1">{{ $totalKategori }}</span>
                                </div>
                                <div class="col">
                                    <p class="fs-3 mb-0"><strong>Total Kategori</strong></p>
                                    <a href="{{ route('kategori.index') }}" class="text-secondary fs-5">Lihat
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-right">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M5 12l14 0" />
                                            <path d="M13 18l6 -6" />
                                            <path d="M13 6l6 6" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
