@extends('dashboard.layouts.main')

@section('isi')
<div class="row">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Data Produksi</h5>

            <div class="alert alert-danger" role="alert">
                <p class="fst-italic text-danger">
                    Harap hati-hati dalam mengelola data. menghapus salah satu data akan mempengaruhi data pada halaman data produksi panen.
                </p>
            </div>

            {{-- Alert Success --}}
            @if (session('successProduksi'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle me-1"></i>
                {{ session('successProduksi') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif


            <button type="button" class="btn btn-primary col-lg-12" data-bs-toggle="modal"
                data-bs-target="#modal-tbh-produksi">
                <i class="bi-plus-circle-dotted"></i>
            </button>

            <!-- Default Table -->
            <table class="table">
                @if ($produksis->isNotEmpty())
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col" class="text-center">Tanaman</th>
                        <th scope="col" class="text-center">Nama Kecamatan</th>
                        <th scope="col" class="text-center">Tahun Panen</th>
                        <th scope="col" class="text-center">Jumlah</th>
                        <th scope="col" colspan="2" class="text-center">Luas Panen</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($produksis as $key => $produksi)
                    <tr>
                        <th scope="row">{{ $produksis->firstItem() + $key }}</th>
                        <td>{{ $produksi->tanaman->nama_tanaman }}</td>
                        <td>{{ $produksi->kecamatan->nama_kecamatan }}</td>
                        <td class="text-center">{{ $produksi->tahun_panen->tahun_panen }}</td>
                        <td class="text-center">{{ $produksi->jumlah }}</td>
                        <td class="text-center">{{ $produksi->luas_panen }}</td>
                        <td class="d-flex justify-content-center">
                            <a class="badge badge-warning link-warning mx-2" title="Edit" href="#"
                                data-bs-toggle="modal" data-bs-target="#modal-ubh-produksi{{ $produksi->id }}">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <a class="badge badge-danger link-danger" title="Hapus" href=""
                                onclick="if(confirm('Apakah anda yakin?')) {
                            event.preventDefault(); document.getElementById('delete-form{{ $produksi->id }}').submit()};">
                                <i class="bi bi-trash"></i>
                                <form action="{{ route('produksi.destroy', $produksi->id) }}" method="post"
                                    id="delete-form{{ $produksi->id }}" class="d-none">
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
                {{ $produksis->links() }}
            </div>
            <!-- End Default Table Example -->
        </div>
    </div>
</div>









{{-- Modal Tambah Data --}}
{{-- Tambah Produksi --}}
<div class="modal fade" id="modal-tbh-produksi" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Tambah Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('produksi.store') }}" method="POST">
                    @csrf

                    <div class="row mb-3">
                        <label for="tanaman_id" class="col-sm-2 col-form-label">Nama Tanaman</label>
                        <div class="col-sm-10">
                            <select class="form-select" aria-label="Default select example" id="tanaman_id"
                                name="tanaman_id">
                                <option selected> -- Pilih -- </option>
                                @foreach ($tanamans as $tanaman)
                                @if (old('tanaman_id') == $tanaman->id)
                                <option value="{{ $tanaman->id }}" selected>{{ $tanaman->nama_tanaman }}</option>
                                @else
                                <option value="{{ $tanaman->id }}">{{ $tanaman->nama_tanaman }}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3 d-none">
                        <div class="col-sm-12">
                            <label for="klasifikasi_id" class="col-sm-2 col-lg-12 col-form-label">Klasifikasi
                                Tanaman</label>
                            <input type="text" name="klasifikasi_id" id="klasifikasi_id"
                                class="form-control @error('klasifikasi_id') is-invalid @enderror"
                                value="{{ old('klasifikasi_id') }}">
                        </div>
                        @error('klasifikasi_id')
                        <div class="invalid-feedback">
                            <small>{{ $message }}</small>
                        </div>
                        @enderror
                    </div>

                    <div class="row mb-3">
                        <label for="kecamatan_id" class="col-sm-2 col-form-label">Nama Kecamatan</label>
                        <div class="col-sm-10">
                            <select class="form-select" aria-label="Default select example" name="kecamatan_id"
                                name="kecamatan_id">
                                <option selected> -- Pilih -- </option>
                                @foreach ($kecamatans as $kecamatan)
                                @if (old('kecamatan_id') == $kecamatan->id)
                                <option value="{{ $kecamatan->id }}" selected>{{ $kecamatan->nama_kecamatan }}</option>
                                @else
                                <option value="{{ $kecamatan->id }}">{{ $kecamatan->nama_kecamatan }}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="tahun_panen_id" class="col-sm-2 col-form-label">Tahun Panen</label>
                        <div class="col-sm-10">
                            <select class="form-select" aria-label="Default select example" id="tahun_panen_id"
                                name="tahun_panen_id">
                                <option selected> -- Pilih -- </option>
                                @foreach ($tahun_panens as $tahun_panen)
                                @if (old('tahun_panen_id') == $tahun_panen->id)
                                <option value="{{ $tahun_panen->id }}" selected>{{ $tahun_panen->tahun_panen }}</option>
                                @else
                                <option value="{{ $tahun_panen->id }}">{{ $tahun_panen->tahun_panen }}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <label for="jumlah" class="col-sm-2 col-lg-12 col-form-label">Jumlah</label>
                            <input type="text" name="jumlah" id="jumlah"
                                class="form-control @error('jumlah') is-invalid @enderror" value="{{ old('jumlah') }}"
                                required>
                        </div>
                        @error('jumlah')
                        <div class="invalid-feedback">
                            <small>{{ $message }}</small>
                        </div>
                        @enderror
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <label for="luas_panen" class="col-sm-2 col-lg-12 col-form-label">Luas Panen</label>
                            <input type="text" name="luas_panen" id="luas_panen"
                                class="form-control @error('luas_panen') is-invalid @enderror"
                                value="{{ old('luas_panen') }}" required>
                        </div>
                        @error('luas_panen')
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
{{-- End Modal Tambah Data --}}






{{-- Modal Ubah Data --}}
{{-- Ubah Produksi --}}
@foreach ($produksis as $produksi)
@php
$id = $produksi->id;
$jumlah = $produksi->jumlah;
$luas_panen = $produksi->luas_panen;
@endphp
<div class="modal fade" id="modal-ubh-produksi{{ $id }}" role="dialog" aria-hidden="true" style="overflow: hidden;"
    tabindex="-1">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Ubah Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('produksi.update',$id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row mb-3">
                        <label for="tanaman_id" class="col-sm-2 col-form-label">Nama Tanaman</label>
                        <div class="col-sm-10">
                            <select class="form-select" aria-label="Default select example" id="tanaman_id"
                                name="tanaman_id">
                                @foreach ($tanamans as $tanaman)
                                @if (old('tanaman_id', $produksi->tanaman_id) == $tanaman->id)
                                <option value="{{ $tanaman->id }}" selected>{{ $tanaman->nama_tanaman }}</option>
                                @else
                                <option value="{{ $tanaman->id }}">{{ $tanaman->nama_tanaman }}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <label for="klasifikasi_id" class="col-sm-2 col-lg-12 col-form-label">Klasifikasi
                                Tanaman</label>
                            <input type="text" name="klasifikasi_id" id="klasifikasi_id"
                                class="form-control @error('klasifikasi_id') is-invalid @enderror"
                                value="{{ old('klasifikasi_id', $produksi->klasifikasi_id) }}"
                                required>
                        </div>
                        @error('klasifikasi_id')
                        <div class="invalid-feedback">
                            <small>{{ $message }}</small>
                        </div>
                        @enderror
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Nama Kecamatan</label>
                        <div class="col-sm-10">
                            <select class="form-select" aria-label="Default select example" id="kecamatan_id"
                                name="kecamatan_id">
                                @foreach ($kecamatans as $kecamatan)
                                @if (old('kecamatan_id', $produksi->kecamatan_id) == $kecamatan->id)
                                <option value="{{ $kecamatan->id }}" selected>{{ $kecamatan->nama_kecamatan }}</option>
                                @else
                                <option value="{{ $kecamatan->id }}">{{ $kecamatan->nama_kecamatan }}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Tahun Panen</label>
                        <div class="col-sm-10">
                            <select class="form-select" aria-label="Default select example" id="tahun_panen_id"
                                name="tahun_panen_id">
                                @foreach ($tahun_panens as $tahun_panen)
                                @if (old('tahun_panen_id', $produksi->tahun_panen_id) == $tahun_panen->id)
                                <option value="{{ $tahun_panen->id }}" selected>{{ $tahun_panen->tahun_panen }}</option>
                                @else
                                <option value="{{ $tahun_panen->id }}">{{ $tahun_panen->tahun_panen }}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <label for="jumlah" class="col-sm-2 col-lg-12 col-form-label">Jumlah</label>
                            <input type="text" name="jumlah" id="jumlah"
                                class="form-control @error('jumlah') is-invalid @enderror"
                                value="{{ old('jumlah', $jumlah) }}" required>
                        </div>
                        @error('jumlah')
                        <div class="invalid-feedback">
                            <small>{{ $message }}</small>
                        </div>
                        @enderror
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <label for="luas_panen" class="col-sm-2 col-lg-12 col-form-label">Luas Panen</label>
                            <input type="text" name="luas_panen" id="luas_panen"
                                class="form-control @error('luas_panen') is-invalid @enderror"
                                value="{{ old('luas_panen', $luas_panen) }}" required>
                        </div>
                        @error('luas_panen')
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
{{-- End Modal Ubah Data --}}
@endsection
