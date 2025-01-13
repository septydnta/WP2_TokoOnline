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

        .btn-danger {
            background-color: #e74c3c;
            border-color: #e74c3c;
            color: #fff;
        }

        .btn-danger:hover {
            background-color: #c0392b;
            border-color: #c0392b;
        }

        .btn-secondary {
            background-color: #95a5a6;
            border-color: #95a5a6;
            color: white;
        }

        .btn-secondary:hover {
            background-color: #7f8c8d;
            border-color: #7f8c8d;
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

        .table th,
        .table td {
            text-align: center;
            vertical-align: middle;
        }

        .table th {
            background-color: #326949;
            color: white;
            font-weight: bold;
        }

        .form-group label {
            font-weight: bold;
            color: #326949;
        }

        .foto-preview {
            max-width: 100%;
            border-radius: 8px;
            margin-top: 10px;
        }

        .add-foto {
            background-color: #326949;
            color: white;
            font-weight: bold;
        }

        .add-foto:hover {
            background-color: #28503e;
        }

        .badge-success {
            background-color: #2ecc71;
        }

        .badge-secondary {
            background-color: #95a5a6;
        }

        .badge {
            font-size: 0.9rem;
            font-weight: bold;
            padding: 5px 10px;
            border-radius: 5px;
        }
    </style>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ $judul }}</h4>
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Kategori</label>
                                    <select name="kategori_id"
                                        class="form-control @error('kategori_id') is-invalid @enderror" disabled>
                                        <option value="" selected> - Pilih Kategori - </option>
                                        @foreach ($kategori as $row)
                                            <option value="{{ $row->id }}"
                                                {{ old('kategori_id', $show->kategori_id) == $row->id ? 'selected' : '' }}>
                                                {{ $row->nama_kategori }}
                                            </option>
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
                                    <input type="text" name="nama_produk"
                                        value="{{ old('nama_produk', $show->nama_produk) }}"
                                        class="form-control @error('nama_produk') is-invalid @enderror"
                                        placeholder="Masukkan Nama Produk" disabled>
                                    @error('nama_produk')
                                        <span class="invalid-feedback alert-danger" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Detail</label>
                                    <textarea name="detail" class="form-control @error('detail') is-invalid @enderror" id="ckeditor" disabled>{{ old('detail', $show->detail) }}</textarea>
                                    @error('detail')
                                        <span class="invalid-feedback alert-danger" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Foto Utama</label> <br>
                                    <img src="{{ asset('storage/img-produk/' . $show->foto) }}" class="foto-preview"
                                        width="100%">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label>Foto Tambahan</label>
                                <div id="foto-container">
                                    <div class="row">
                                        @foreach ($show->fotoProduk as $gambar)
                                            <div class="col-md-8">
                                                <img src="{{ asset('storage/img-produk/' . $gambar->foto) }}"
                                                    width="100%">
                                            </div>
                                            <div class="col-md-4">
                                                <form action="{{ route('backend.foto_produk.destroy', $gambar->id) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                                </form>
                                            </div>
                                        @endforeach
                                    </div>
                                    <br>
                                </div>
                                <button type="button" class="btn btn-primary add-foto mt-2">Tambah Foto</button>
                            </div>

                        </div>
                    </div>

                    <div class="border-top">
                        <div class="card-body">
                            <a href="{{ route('backend.produk.index') }}">
                                <button type="button" class="btn btn-secondary">Kembali</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- contentAkhir -->
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const fotoContainer = document.getElementById('foto-container');
        const addFotoButton = document.querySelector('.add-foto');

        addFotoButton.addEventListener('click', function() {
            const fotoRow = document.createElement('div');
            fotoRow.classList.add('form-group', 'row');
            fotoRow.innerHTML = `
                <form action="{{ route('backend.foto_produk.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-12">
                        <input type="hidden" name="produk_id" value="{{ $show->id }}">
                        <input type="file" name="foto_produk[]" class="form-control @error('foto_produk') is-invalid @enderror">
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </form>
            `;
            fotoContainer.appendChild(fotoRow);
        });
    });
</script>
