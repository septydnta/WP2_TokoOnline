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
            background-color: #7a7a7a;
            border-color: #7a7a7a;
            color: #fff;
            font-weight: bold;
        }

        .btn-secondary:hover {
            background-color: #6c6c6c;
            border-color: #6c6c6c;
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
            padding: 10px;
            margin-top: 5px;
        }

        .form-control:focus {
            border-color: #326949;
            box-shadow: 0 0 5px rgba(50, 105, 73, 0.5);
        }

        .invalid-feedback {
            color: #e74c3c;
        }

        .foto-preview {
            border-radius: 8px;
            margin-bottom: 10px;
        }
    </style>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form class="form-horizontal" action="{{ route('backend.produk.store') }}" method="post"
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
                                            <div class="invalid-feedback alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Kategori</label>
                                        <select class="form-control @error('kategori') is-invalid @enderror"
                                            name="kategori_id">
                                            <option value="" selected>--Pilih Kategori--</option>
                                            @foreach ($kategori as $k)
                                                <option value="{{ $k->id }}"> {{ $k->nama_kategori }} </option>
                                            @endforeach
                                        </select>
                                        @error('kategori_id')
                                            <span class="invalid-feedback alert-danger" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Produk</label>
                                        <input type="text" name="nama_produk" value="{{ old('nama_produk') }}"
                                            class="form-control @error('nama_produk') is-invalid @enderror"
                                            placeholder="Masukkan Nama Produk">
                                        @error('nama_produk')
                                            <span class="invalid-feedback alert-danger" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Detail</label><br>
                                        <textarea name="detail" class="form-control @error('detail') is-invalid @enderror" id="ckeditor">{{ old('detail') }}</textarea>
                                        @error('detail')
                                            <span class="invalid-feedback alert-danger" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Harga</label>
                                        <input type="text" onkeypress="return hanyaAngka(event)" name="harga"
                                            value="{{ old('harga') }}"
                                            class="form-control @error('harga') is-invalid @enderror"
                                            placeholder="Masukkan Harga Produk">
                                        @error('harga')
                                            <span class="invalid-feedback alert-danger" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Berat</label>
                                        <input type="text" onkeypress="return hanyaAngka(event)" name="berat"
                                            value="{{ old('berat') }}"
                                            class="form-control @error('berat') is-invalid @enderror"
                                            placeholder="Masukkan Berat Produk">
                                        @error('berat')
                                            <span class="invalid-feedback alert-danger" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Stok</label>
                                        <input type="text" onkeypress="return hanyaAngka(event)" name="stok"
                                            value="{{ old('stok') }}"
                                            class="form-control @error('stok') is-invalid @enderror"
                                            placeholder="Masukkan Stok Produk">
                                        @error('stok')
                                            <span class="invalid-feedback alert-danger" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="border-top">
                            <div class="card-body">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="{{ route('backend.produk.index') }}">
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
