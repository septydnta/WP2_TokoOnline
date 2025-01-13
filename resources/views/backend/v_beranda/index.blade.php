@extends('backend.v_layouts.app')
@section('content')
    <!-- contentAwal -->
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .card-body {
            background: #326949;
            color: #fff;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-title {
            font-size: 1.8rem;
            font-weight: bold;
            margin-bottom: 1rem;
        }

        .alert {
            background: rgba(255, 255, 255, 0.1);
            border: none;
            color: #e8f5e9;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .alert-heading {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 0.5rem;
        }

        b {
            color: #fdd835;
            text-transform: uppercase;
        }

        .alert-heading,
        p {
            line-height: 1.6;
        }
    </style>

    <div class="row">
        <div class="col-12">
            <div class="card-body border-top">
                <h5 class="card-title">{{ $judul }}</h5>
                <div class="alert alert-success" role="alert">
                    <h4 class="alert-heading">Selamat Datang, {{ Auth::user()->nama }}</h4>
                    Aplikasi Mini Market dengan hak akses yang Anda miliki sebagai
                    <b>
                        @if (Auth::user()->role == 1)
                            Super Admin
                        @elseif(Auth::user()->role == 0)
                            Admin
                        @endif
                    </b>
                    Ini adalah halaman utama dari aplikasi Web Programming Studi Kasus Mini Market.
                </div>
            </div>
        </div>
    </div>
    <!-- contentAkhir -->
@endsection
