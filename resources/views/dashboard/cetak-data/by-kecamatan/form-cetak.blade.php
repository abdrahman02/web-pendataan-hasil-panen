@extends('dashboard.layouts.main')
@section('isi')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Form Cetak Data Produksi By Kecamatan</h4>
            <div class="alert alert-success" role="alert">
                <p class="fst-italic text-success">
                    Silahkan pilih kecamatan untuk mencetak data produksi berdasarkan kecamatan yang diinginkan. Atau
                    anda dapat
                    menekan tombol cetak seluruh untuk mencetak data produksi berdasarkan seluruh kecamatan.
                </p>
            </div>

            <a href="{{ route('cetakKecamatan') }}" target="_blank" class="btn btn-success float-end mb-3">
                <span class="bi-printer me-1"></span>
                Cetak Seluruh
            </a>

            <div class="form-group">

                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <span class="bi-pin-map input-group-text fs-4"></span>
                    </div>
                    <select class="form-control" id="kecamatan" name="kecamatan">
                        <option value="" selected> -- Pilih -- </option>
                        @foreach ($items as $item)
                        <option value="{{ $item->kecamatan_id }}">{{ $item->kecamatan->nama_kecamatan }}</option>
                        @endforeach
                    </select>
                </div>

                <a href=""
                    onclick="this.href='/dashboard/cetak-data/cetak-perkecamatan/' + document.getElementById('kecamatan').value"
                    target="_blank" class="btn btn-primary col-12">
                    <span class="bi-printer me-1"></span>
                    Cetak
                </a>

            </div>
        </div>
    </div>
</div>
@endsection