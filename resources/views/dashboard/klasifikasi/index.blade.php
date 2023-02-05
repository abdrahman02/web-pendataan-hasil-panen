@extends('dashboard.layouts.main')
@section('isi')
<div class="row">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Data Klaisifikasi Tanaman</h5>

            <div class="alert alert-danger" role="alert">
                <p class="fst-italic text-danger">
                    Harap hati-hati dalam mengelola data. menghapus salah satu data akan mempengaruhi data pada halaman data produksi panen.
                </p>
            </div>

            {{-- Alert Success --}}
            @if (session('successKlasifikasi'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle me-1"></i>
                {{ session('successKlasifikasi') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif


            <button type="button" class="btn btn-primary col-lg-12" data-bs-toggle="modal"
                data-bs-target="#modal-tbh-klasifikasi-tanaman">
                <i class="bi-plus-circle-dotted"></i>
            </button>

            <!-- Default Table -->
            <table class="table">
                @if ($klasifikasi_tanamans->isNotEmpty())
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col" colspan="2" class="text-center">Nama Klasifikasi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($klasifikasi_tanamans as $key => $klasifikasi_tanaman)
                    <tr>
                        <th scope="row">{{ $klasifikasi_tanamans->firstItem() + $key }}</th>
                        <td>{{ $klasifikasi_tanaman->nama_klasifikasi }}</td>
                        <td class="d-flex justify-content-center">
                            <a class="badge badge-warning link-warning mx-2" title="Edit" href="#"
                                data-bs-toggle="modal"
                                data-bs-target="#modal-ubh-klasifikasi-tanaman{{ $klasifikasi_tanaman->id }}">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <a class="badge badge-danger link-danger" title="Hapus" href=""
                                onclick="if(confirm('Apakah anda yakin?')) {
                            event.preventDefault(); document.getElementById('delete-form{{ $klasifikasi_tanaman->id }}').submit()};">
                                <i class="bi bi-trash"></i>
                                <form action="{{ route('klasifikasi-tanaman.destroy', $klasifikasi_tanaman->id) }}"
                                    method="post" id="delete-form{{ $klasifikasi_tanaman->id }}" class="d-none">
                                    @csrf
                                    @method('delete')
                                </form>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                @else
                <div class="alert alert-primary text-center" role="alert">
                    Data is empty, please add data first!!
                </div>
                @endif
            </table>
            <div class="d-flex justify-content-center">
                {{ $klasifikasi_tanamans->links() }}
            </div>
            <!-- End Default Table Example -->
        </div>
    </div>
</div>

{{-- Modal Tambah Data --}}
<div class="modal fade" id="modal-tbh-klasifikasi-tanaman" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Tambah Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('klasifikasi-tanaman.store') }}" method="POST">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <label for="nama_klasifikasi" class="col-sm-2 col-lg-12 col-form-label">Nama
                                Klasifikasi</label>
                            <input type="text" name="nama_klasifikasi" id="nama_klasifikasi"
                                class="form-control @error('nama_klasifikasi') is-invalid @enderror"
                                value="{{ old('nama_klasifikasi') }}" autofocus required>
                        </div>
                        @error('nama_klasifikasi')
                        <div class="invalid-feedback">
                            <small>{{ $message }}</small>
                        </div>
                        @enderror
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-success">Tambah Data</button>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal"
                                aria-label="Close">Batal</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>


{{-- Modal Ubah Data --}}
@foreach ($klasifikasi_tanamans as $klasifikasi_tanaman)
@php
$id = $klasifikasi_tanaman->id;
$nama_klasifikasi = $klasifikasi_tanaman->nama_klasifikasi;
@endphp
<div class="modal fade" id="modal-ubh-klasifikasi-tanaman{{ $id }}" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Ubah Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('klasifikasi-tanaman.update', $id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <label for="nama_klasifikasi" class="col-sm-2 col-lg-12 col-form-label">Nama
                                Klasifikasi</label>
                            <input type="text" name="nama_klasifikasi" id="nama_klasifikasi"
                                class="form-control @error('nama_klasifikasi', $nama_klasifikasi) is-invalid @enderror"
                                value="{{ old('nama_klasifikasi', $nama_klasifikasi) }}" autofocus required>
                        </div>
                        @error('nama_klasifikasi')
                        <div class="invalid-feedback">
                            <small>{{ $message }}</small>
                        </div>
                        @enderror
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-success">Tambah Data</button>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal"
                                aria-label="Close">Batal</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection