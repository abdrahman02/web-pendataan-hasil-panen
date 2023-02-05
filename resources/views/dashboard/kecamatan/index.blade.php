@extends('dashboard.layouts.main')
@section('isi')
<div class="row">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Data Kecamatan</h5>

            <div class="alert alert-danger" role="alert">
                <p class="fst-italic text-danger">
                    Harap hati-hati dalam mengelola data. menghapus salah satu data akan mempengaruhi data pada halaman data produksi panen.
                </p>
            </div>


            {{-- Alert Success --}}
            @if (session('successKecamatan'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle me-1"></i>
                {{ session('successKecamatan') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif


            <button type="button" class="btn btn-primary col-lg-12" data-bs-toggle="modal"
                data-bs-target="#modal-tbh-kecamatan">
                <i class="bi-plus-circle-dotted"></i>
            </button>

            <!-- Default Table -->
            <table class="table">
                @if ($kecamatans->isNotEmpty())
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col" colspan="2" class="text-center">Nama Kecamatan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kecamatans as $key => $kecamatan)
                    <tr>
                        <th scope="row">{{ $kecamatans->firstItem() + $key }}</th>
                        <td>{{ $kecamatan->nama_kecamatan }}</td>
                        <td class="d-flex justify-content-center">
                            <a class="badge badge-warning link-warning mx-2" title="Edit" href="#"
                                data-bs-toggle="modal" data-bs-target="#modal-ubh-kecamatan{{ $kecamatan->id }}">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <a class="badge badge-danger link-danger" title="Hapus" href="#"
                                onclick="if(confirm('Apakah anda yakin?')) {
                                event.preventDefault(); document.getElementById('delete-form{{ $kecamatan->id }}').submit()};">
                                <i class="bi bi-trash"></i>
                                <form action="{{ route('kecamatan.destroy', $kecamatan->id) }}" method="post"
                                    id="delete-form{{ $kecamatan->id }}" class="d-none">
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
                {{ $kecamatans->links() }}
            </div>
            <!-- End Default Table Example -->
        </div>
    </div>
</div>

{{-- Modal Tambah Data --}}
<div class="modal fade" id="modal-tbh-kecamatan" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Tambah Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('kecamatan.store') }}" method="POST">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <label for="nama_kecamatan" class="col-sm-2 col-lg-12 col-form-label">Nama Kecamatan</label>
                            <input type="text" name="nama_kecamatan" id="nama_kecamatan"
                                class="form-control @error('nama_kecamatan') is-invalid @enderror"
                                value="{{ old('nama_kecamatan') }}" autofocus required>
                        </div>
                        @error('nama_kecamatan')
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
@foreach ($kecamatans as $kecamatan)
@php
$id = $kecamatan->id;
$nama_kecamatan = $kecamatan->nama_kecamatan
@endphp
<div class="modal fade" id="modal-ubh-kecamatan{{ $id }}" role="dialog" aria-hidden="true" style="overflow: hidden;"
    tabindex="-1">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Ubah Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('kecamatan.update',$id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <label for="nama_kecamatan" class="col-sm-2 col-lg-12 col-form-label">Nama Kecamatan</label>
                            <input type="text" name="nama_kecamatan" id="nama_kecamatan"
                                class="form-control @error('nama_kecamatan') is-invalid @enderror"
                                value="{{ old('nama_kecamatan', $nama_kecamatan) }}" autofocus required>
                        </div>
                        @error('nama_kecamatan')
                        <div class="invalid-feedback">
                            <small>{{ $message }}</small>
                        </div>
                        @enderror
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-success">Ubah Data</button>
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