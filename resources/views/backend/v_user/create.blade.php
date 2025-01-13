@extends('backend.v_layouts.app')
@section('content')
    <!-- contentAwal -->

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .btn-primary {
            background-color: #326949;
            border-color: #326949;
            color: #fff;
            font-weight: bold;
        }

        .btn-primary:hover {
            background-color: #28503e;
            border-color: #28503e;
        }

        .btn-secondary {
            background-color: #f5f5f5;
            border-color: #ccc;
            color: #333;
            font-weight: bold;
        }

        .btn-secondary:hover {
            background-color: #e0e0e0;
            border-color: #bbb;
        }

        .card {
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 1.5rem;
        }

        .card-title {
            color: #326949;
            font-size: 1.5rem;
            font-weight: bold;
        }

        .form-group label {
            font-weight: bold;
            color: #326949;
        }

        .form-control {
            border: 1px solid #ddd;
            border-radius: 8px;
        }

        .form-control:focus {
            border-color: #326949;
            box-shadow: 0 0 5px rgba(50, 105, 73, 0.5);
        }

        .invalid-feedback {
            color: #b71c1c;
            font-weight: bold;
        }

        .foto-preview {
            display: block;
            width: 100%;
            max-width: 150px;
            margin-bottom: 10px;
            border-radius: 10px;
        }

        .border-top {
            border-top: 2px solid #326949;
            padding-top: 15px;
        }
    </style>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form class="form-horizontal" action="{{ route('backend.user.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="card-body">
                            <h4 class="card-title"> {{ $judul }} </h4>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Foto</label>
                                        <img class="foto-preview">
                                        <input type="file" name="foto"
                                            class="form-control @error('foto') is-invalid @enderror"
                                            onchange="previewFoto()">
                                        @error('foto')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Hak Akses</label>
                                        <select name="role" class="form-control @error('role') is-invalid @enderror">
                                            <option value="" {{ old('role') == '' ? 'selected' : '' }}> - Pilih Hak
                                                Akses -</option>
                                            <option value="1" {{ old('role') == '1' ? 'selected' : '' }}> Super Admin
                                            </option>
                                            <option value="0" {{ old('role') == '0' ? 'selected' : '' }}> Admin
                                            </option>
                                        </select>
                                        @error('role')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" name="nama" value="{{ old('nama') }}"
                                            class="form-control @error('nama') is-invalid @enderror"
                                            placeholder="Masukkan Nama">
                                        @error('nama')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" name="email" value="{{ old('email') }}"
                                            class="form-control @error('email') is-invalid @enderror"
                                            placeholder="Masukkan Email">
                                        @error('email')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>HP</label>
                                        <input type="text" onkeypress="return hanyaAngka(event)" name="hp"
                                            value="{{ old('hp') }}"
                                            class="form-control @error('hp') is-invalid @enderror"
                                            placeholder="Masukkan Nomor HP">
                                        @error('hp')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            placeholder="Masukkan Password">
                                        @error('password')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Konfirmasi Password</label>
                                        <input type="password" name="password_confirmation" class="form-control"
                                            placeholder="Konfirmasi Password">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="border-top">
                            <div class="card-body">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="{{ route('backend.user.index') }}">
                                    <button type="button" class="btn btn-secondary">Kembali</button>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- contentAkhir -->
@endsection
