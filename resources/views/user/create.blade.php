@extends('layouts.dashboard.main')
@section('title', 'Tambah User - SemBarang')
@section('content')
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container">
            <h2>User</h2>
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
                            <div class="card-title">Tambah User</div>
                            <div>
                                <a href="{{ route('user.index') }}" class="btn btn-secondary">Kembali</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('user.store') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="nama_user">Nama</label>
                                            <input class="form-control @error('nama') is-invalid @enderror" type="text"
                                                name="nama" id="nama_user" placeholder="Ketik nama lengkap user"
                                                autofocus value="{{ old('nama') }}">
                                            @error('nama')
                                                <div class="invalid-feedback mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="username">Username</label>
                                            <input class="form-control @error('username') is-invalid @enderror"
                                                type="text" name="username" id="username" placeholder="Ketik username"
                                                value="{{ old('username') }}">
                                            @error('username')
                                                <div class="invalid-feedback mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="checkbox" name="admin" value="1"
                                                id="admin_checkbox" {{ old('admin') ? 'checked' : '' }}>
                                            <label class="form-check-label" for="admin_checkbox">
                                                Jadikan sebagai Admin?
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="password">Password</label>
                                            <input class="form-control @error('password') is-invalid @enderror"
                                                type="password" name="password" id="password">
                                            @error('password')
                                                <div class="invalid-feedback mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="password_confirmation">Konfirmasi
                                                Password</label>
                                            <input class="form-control @error('password_confirmation') is-invalid @enderror"
                                                type="password" name="password_confirmation" id="password_confirmation">
                                            @error('password_confirmation')
                                                <div class="invalid-feedback mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <button class="btn btn-primary float-end" type="submit">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
