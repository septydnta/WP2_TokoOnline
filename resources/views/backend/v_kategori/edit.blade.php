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

        .border-top {
            border-top: 2px solid #326949;
            padding-top: 15px;
        }
    </style>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form action="{{ route('backend.kategori.update', $edit->id) }}" method="post">
                        @method('put')
                        @csrf
                        <div class="card-body">
                            <h4 class="card-title"> {{ $judul }} </h4>
                            <div class="form-group">
                                <label>Nama Kategori</label>
                                <input type="text" name="nama_kategori"
                                    value="{{ old('nama_kategori', $edit->nama_kategori) }}"
                                    class="form-control @error('nama_kategori') is-invalid @enderror"
                                    placeholder="Masukkan Nama Kategori">
                                @error('nama_kategori')
                                    <span class="invalid-feedback alert-danger" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>

                        </div>
                        <div class="border-top">
                            <div class="card-body">
                                <button type="submit" class="btn btn-primary">Perbaharui</button>
                                <a href="{{ route('backend.kategori.index') }}">
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
