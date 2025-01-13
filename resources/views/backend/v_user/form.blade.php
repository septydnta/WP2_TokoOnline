@extends('backend.v_layouts.app')
@section('content')
    <!-- template -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <form class="form-horizontal" action="{{ route('backend.laporan.cetakuser') }}" method="post" target="_blank">
                    @csrf

                    <div class="card-body">
                        <h4 class="card-title" style="color: #326949;"> {{ $judul }} </h4>
                        <!-- Apply the color to the title -->

                        <div class="form-group">
                            <label for="tanggal_awal" style="color: #326949;">Tanggal Awal</label>
                            <!-- Apply color to label -->
                            <input type="date" name="tanggal_awal" onkeypress="return hanyaAngka(event)"
                                value="{{ old('tanggal_awal') }}"
                                class="form-control @error('tanggal_awal') is-invalid @enderror"
                                placeholder="Masukkan Jumlah Pinjam">
                            @error('tanggal_awal')
                                <span class="invalid-feedback alert-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="tanggal_akhir" style="color: #326949;">Tanggal Akhir</label>
                            <!-- Apply color to label -->
                            <input type="date" name="tanggal_akhir" onkeypress="return hanyaAngka(event)"
                                value="{{ old('tanggal_akhir') }}"
                                class="form-control @error('tanggal_akhir') is-invalid @enderror"
                                placeholder="Masukkan Jumlah Pinjam">
                            @error('tanggal_akhir')
                                <span class="invalid-feedback alert-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <br>
                        <button type="submit" class="btn btn-primary"
                            style="background-color: #326949; border-color: #326949;">Cetak</button>
                        <!-- Apply color to button -->
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- end template-->
@endsection
