@extends('dashboard.layouts.main')
@section('isi')
<div class="row">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Data Tanaman</h5>

            <div class="alert alert-danger" role="alert">
                <p class="fst-italic text-danger">
                    Harap hati-hati dalam mengelola data. menghapus salah satu data akan mempengaruhi data pada halaman data produksi panen.
                </p>
            </div>


            {{-- Alert Success --}}
            @if (session('successTanaman'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle me-1"></i>
                {{ session('successTanaman') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif


            <button type="button" class="btn btn-primary col-lg-12" data-bs-toggle="modal"
                data-bs-target="#modal-tbh-tanaman">
                <i class="bi-plus-circle-dotted"></i>
            </button>

            <!-- Default Table -->
            <table class="table">
                @if ($tanamans->isNotEmpty())
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col" class="text-center">Nama Klasifikasi</th>
                        <th scope="col" colspan="2" class="text-center">Nama Tanaman</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tanamans as $key => $tanaman)
                    <tr>
                        <th scope="row">{{ $tanamans->firstItem() + $key }}</th>
                        <td>{{ $tanaman->klasifikasi_tanaman->nama_klasifikasi }}</td>
                        <td>{{ $tanaman->nama_tanaman }}</td>
                        <td class="d-flex justify-content-center">
                            <a class="badge badge-warning link-warning mx-2" title="Edit" href="#"
                                data-bs-toggle="modal"
                                data-bs-target="#modal-ubh-tanaman{{ $tanaman->id }}">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <a class="badge badge-danger link-danger" title="Hapus" href=""
                                onclick="if(confirm('Apakah anda yakin?')) {
                            event.preventDefault(); document.getElementById('delete-form{{ $tanaman->id }}').submit()};">
                                <i class="bi bi-trash"></i>
                                <form action="{{ route('tanaman.destroy', $tanaman->id) }}"
                                    method="post" id="delete-form{{ $tanaman->id }}" class="d-none">
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
                {{ $tanamans->links() }}
            </div>
            <!-- End Default Table Example -->
        </div>
    </div>
</div>

{{-- Modal Tambah Data --}}
<div class="modal fade" id="modal-tbh-tanaman" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Tambah Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('tanaman.store') }}" method="POST">
                    @csrf

                    <div class="row mb-3">
                        <label for="klasifikasi_id" class="col-sm-2 col-form-label">Klasifikasi</label>
                        <div class="col-sm-10">
                            <select class="form-select" aria-label="Default select example" name="klasifikasi_id"
                                name="klasifikasi_id">
                                <option selected> -- Pilih -- </option>
                                @foreach ($klasifikasi_tanamans as $klasifikasi_tanaman)
                                @if (old('klasifikasi_id') == $klasifikasi_tanaman->id)
                                <option value="{{ $klasifikasi_tanaman->id }}" selected>{{
                                    $klasifikasi_tanaman->nama_klasifikasi }}</option>
                                @else
                                <option value="{{ $klasifikasi_tanaman->id }}">{{ $klasifikasi_tanaman->nama_klasifikasi
                                    }}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <label for="nama_tanaman" class="col-sm-2 col-lg-12 col-form-label">Nama
                                Tanaman</label>
                            <input type="text" name="nama_tanaman" id="nama_tanaman"
                                class="form-control @error('nama_tanaman') is-invalid @enderror"
                                value="{{ old('nama_tanaman') }}" autofocus required>
                        </div>
                        @error('nama_tanaman')
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
@foreach ($tanamans as $tanaman)
@php
$id = $tanaman->id;
$nama_tanaman = $tanaman->nama_tanaman;
@endphp
<div class="modal fade" id="modal-ubh-tanaman{{ $id }}" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Ubah Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('tanaman.update', $id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row mb-3">
                        <label for="klasifikasi_id" class="col-sm-2 col-form-label">Klasifikasi</label>
                        <div class="col-sm-10">
                            <select class="form-select" aria-label="Default select example" name="klasifikasi_id"
                                name="klasifikasi_id">
                                @foreach ($klasifikasi_tanamans as $klasifikasi_tanaman)
                                @if (old('klasifikasi_id', $tanaman->klasifikasi_id) == $klasifikasi_tanaman->id)
                                <option value="{{ $klasifikasi_tanaman->id }}" selected>{{
                                    $klasifikasi_tanaman->nama_klasifikasi }}</option>
                                @else
                                <option value="{{ $klasifikasi_tanaman->id }}">{{ $klasifikasi_tanaman->nama_klasifikasi
                                    }}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <label for="nama_tanaman" class="col-sm-2 col-lg-12 col-form-label">Nama
                                Klasifikasi</label>
                            <input type="text" name="nama_tanaman" id="nama_tanaman"
                                class="form-control @error('nama_tanaman', $nama_tanaman) is-invalid @enderror"
                                value="{{ old('nama_tanaman', $nama_tanaman) }}" autofocus required>
                        </div>
                        @error('nama_tanaman')
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