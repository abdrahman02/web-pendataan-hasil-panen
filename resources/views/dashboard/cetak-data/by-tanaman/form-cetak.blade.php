@extends('dashboard.layouts.main')
@section('isi')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Form Cetak Data Produksi By Tanaman</h4>
            <div class="alert alert-success" role="alert">
                <p class="fst-italic text-success">
                    Silahkan pilih Tanaman untuk mencetak data produksi berdasarkan Tanaman yang diinginkan. Atau anda dapat
                    menekan tombol cetak seluruh untuk mencetak data produksi berdasarkan seluruh Tanaman.
                </p>
              </div>

            <a href="{{ route('cetakTanaman') }}" target="_blank"
                class="btn btn-success float-end mb-3">
                <span class="bi-printer me-1"></span>
                Cetak Seluruh
            </a>

            <div class="form-group">

                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <span class="bi-tree input-group-text fs-4"></span>
                    </div>
                    <select class="form-control" id="tanaman" name="tanaman">
                        <option value="" selected> -- Pilih -- </option>
                        @foreach ($items as $item)
                        <option value="{{ $item->tanaman_id }}">{{ $item->tanaman->nama_tanaman }}</option>
                        @endforeach
                    </select>
                </div>

                <a href=""
                    onclick="this.href='/dashboard/cetak-data/cetak-pertanaman/' + document.getElementById('tanaman').value"
                    target="_blank" class="btn btn-primary col-12">
                    <span class="bi-printer me-1"></span>
                    Cetak
                </a>

            </div>
        </div>
    </div>
</div>
@endsection