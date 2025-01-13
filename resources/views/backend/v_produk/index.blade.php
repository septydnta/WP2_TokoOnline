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

        .btn-warning {
            background-color: #f39c12;
            border-color: #f39c12;
            color: #fff;
        }

        .btn-warning:hover {
            background-color: #e67e22;
            border-color: #e67e22;
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

        .btn-cyan {
            background-color: #00bcd4;
            border-color: #00bcd4;
            color: #fff;
        }

        .btn-cyan:hover {
            background-color: #0097a7;
            border-color: #0097a7;
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

        .table th, .table td {
            text-align: center;
            vertical-align: middle;
        }

        .table th {
            background-color: #326949;
            color: white;
            font-weight: bold;
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

    <div class="row">
        <div class="col-12">
            <a href="{{ route('backend.produk.create') }}">
                <button type="button" class="btn btn-primary"><i class="fas fa-plus"></i>Tambah</button>
            </a>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"> {{ $judul }} </h5>
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kategori</th>
                                    <th>Status</th>
                                    <th>Nama Produk</th>
                                    <th>Harga</th>
                                    <th>Stok</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($index as $row)
                                    <tr>
                                        <td> {{ $loop->iteration }}</td>
                                        <td> {{ $row->kategori->nama_kategori }} </td>
                                        <td>
                                            @if ($row->status == 1)
                                                <span class="badge badge-success">Publis</span>
                                            @elseif($row->status == 0)
                                                <span class="badge badge-secondary">Blok</span>
                                            @endif
                                        </td>
                                        <td> {{ $row->nama_produk }} </td>
                                        <td> Rp. {{ number_format($row->harga, 0, ',', '.') }}</td>
                                        <td> {{ $row->stok }} </td>
                                        <td>
                                            <a href="{{ route('backend.produk.edit', $row->id) }}" title="Ubah Data">
                                                <button type="button" class="btn btn-cyan btn-sm"><i
                                                        class="far fa-edit"></i> Ubah</button>
                                            </a>
                                            <a href="{{ route('backend.produk.show', $row->id) }}" title="Ubah Data">
                                                <button type="button" class="btn btn-warning btn-sm"><i
                                                        class="fas fa-plus"></i> Gambar</button>
                                            </a>
                                            <form method="POST" action="{{ route('backend.produk.destroy', $row->id) }}"
                                                style="display: inline-block;">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm show_confirm"
                                                    data-konf-delete="{{ $row->nama }}" title='Hapus Data'>
                                                    <i class="fas fa-trash"></i> Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- contentAkhir -->
@endsection
