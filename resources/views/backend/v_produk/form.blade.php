@extends('backend.v_layouts.app')
@section('content')
    <!-- template -->

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

        .btn {
            font-weight: bold;
        }
    </style>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form class="form-horizontal" action="{{ route('backend.laporan.cetakproduk') }}" method="post"
                        target="_blank">
                        @csrf

                        <div class="card-body">
                            <h4 class="card-title"> {{ $judul }} </h4>

                            <div class="form-group">
                                <label>Tanggal Awal</label>
                                <input type="date" name="tanggal_awal" value="{{ old('tanggal_awal') }}"
                                    class="form-control @error('tanggal_awal') is-invalid @enderror">
                                @error('tanggal_awal')
                                    <span class="invalid-feedback alert-danger" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Tanggal Akhir</label>
                                <input type="date" name="tanggal_akhir" value="{{ old('tanggal_akhir') }}"
                                    class="form-control @error('tanggal_akhir') is-invalid @enderror">
                                @error('tanggal_akhir')
                                    <span class="invalid-feedback alert-danger" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>

                            <br>
                            <button type="submit" class="btn btn-primary">Cetak</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- end template -->
@endsection
