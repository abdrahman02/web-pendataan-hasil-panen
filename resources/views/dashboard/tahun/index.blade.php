@extends('dashboard.layouts.main')
@section('isi')
<div class="row">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Data Tahun Panen</h5>

            <div class="alert alert-danger" role="alert">
                <p class="fst-italic text-danger">
                    Harap hati-hati dalam mengelola data. menghapus salah satu data akan mempengaruhi data pada halaman data produksi panen.
                </p>
            </div>

            @if (session('successTahunPanen'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle me-1"></i>
                {{ session('successTahunPanen') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif


            <button type="button" class="btn btn-primary col-lg-12" data-bs-toggle="modal"
                data-bs-target="#modal-tbh-tahun-panen">
                <i class="bi-plus-circle-dotted"></i>
            </button>

            <!-- Default Table -->
            <table class="table">
                @if ($tahun_panens->isNotEmpty())
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col" colspan="2" class="text-center">Tahun Panen</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tahun_panens as $key => $tahun_panen)
                    <tr>
                        <th scope="row">{{ $tahun_panens->firstItem() + $key }}</th>
                        <td class="text-center">{{ $tahun_panen->tahun_panen }}</td>
                        <td class="d-flex justify-content-center">
                            <a class="badge badge-warning link-warning mx-2" title="Edit" href="#"
                                data-bs-toggle="modal" data-bs-target="#modal-ubh-tahun-panen{{ $tahun_panen->id }}">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <a class="badge badge-danger link-danger" title="Hapus" href=""
                                onclick="if(confirm('Apakah anda yakin?')) {
                                event.preventDefault(); document.getElementById('delete-form{{ $tahun_panen->id }}').submit()};">
                                <i class="bi bi-trash"></i>
                                <form action="{{ route('tahun-panen.destroy', $tahun_panen->id) }}" method="post"
                                    id="delete-form{{ $tahun_panen->id }}" class="d-none">
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
                {{ $tahun_panens->links() }}
            </div>
            <!-- End Default Table Example -->
        </div>
    </div>
</div>

{{-- Modal Tambah Data --}}
<div class="modal fade" id="modal-tbh-tahun-panen" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Tambah Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('tahun-panen.store') }}" method="POST">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <label for="tahun_panen" class="col-sm-2 col-lg-12 col-form-label">Tahun Panen</label>
                            <input type="text" name="tahun_panen" id="tahun_panen"
                                class="form-control @error('tahun_panen') is-invalid @enderror"
                                value="{{ old('tahun_panen') }}" autofocus required>
                        </div>
                        @error('tahun_panen')
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
@foreach ($tahun_panens as $tahun_panen)
@php
$id = $tahun_panen->id;
$tahun_panen = $tahun_panen->tahun_panen;
@endphp
<div class="modal fade" id="modal-ubh-tahun-panen{{ $id }}" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Ubah Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('tahun-panen.update', $id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <label for="tahun_panen" class="col-sm-2 col-lg-12 col-form-label">Tahun Panen</label>
                            <input type="text" name="tahun_panen" id="tahun_panen"
                                class="form-control @error('tahun_panen') is-invalid @enderror"
                                value="{{ old('tahun_panen', $tahun_panen) }}" autofocus required>
                        </div>
                        @error('tahun_panen')
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