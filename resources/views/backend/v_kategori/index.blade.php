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

        .table {
            background-color: #fff;
            border-radius: 10px;
            overflow: hidden;
        }

        .table thead {
            background-color: #326949;
            color: #fff;
        }

        .table thead th {
            text-align: center;
            font-weight: bold;
            text-transform: uppercase;
        }

        .table tbody tr:hover {
            background-color: #f1f1f1;
        }

        .btn-cyan {
            background-color: #007bff;
            border: none;
            color: #fff;
            font-weight: bold;
        }

        .btn-cyan:hover {
            background-color: #0056b3;
        }

        .btn-danger {
            font-weight: bold;
        }

        .btn-danger:hover {
            background-color: #b71c1c;
            border-color: #b71c1c;
        }
    </style>

    <div class="row">
        <div class="col-12">
            <a href="{{ route('backend.kategori.create') }}">
                <button type="button" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah</button>
            </a>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"> {{ $judul }} </h5>
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kategori</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($index as $row)
                                    <tr>
                                        <td> {{ $loop->iteration }} </td>
                                        <td> {{ $row->nama_kategori }} </td>
                                        <td>
                                            <a href="{{ route('backend.kategori.edit', $row->id) }}" title="Ubah Data">
                                                <button type="button" class="btn btn-cyan btn-sm"><i
                                                        class="far fa-edit"></i> Ubah</button>
                                            </a>
                                            <form method="POST" action="{{ route('backend.kategori.destroy', $row->id) }}"
                                                style="display: inline-block;">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm show_confirm"
                                                    data-konf-delete="{{ $row->nama_kategori }}" title='Hapus Data'>
                                                    <i class="fas fa-trash"></i> Hapus
                                                </button>
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
