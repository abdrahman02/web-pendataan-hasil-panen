<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Keseluruhan Data</title>

    {{-- Template Main CSS --}}
    <link rel="stylesheet" href="{{ asset('css/vertical-layout-light/style.css') }}">

    {{-- Shortcut Icon --}}
    <link rel="shortcut icon" href="{{ asset('img/logo_pemko_lhokseumawe.png') }}" type="image/x-icon">
</head>

<body class="my-2 mx-2">
    <div class="row">
        <div class="col-2 mt-3 ms-5">
            <img src="{{ asset('img/logo_pemko_lhokseumawe.png') }}" alt="" style="max-height: 100px">
        </div>
        <div class="col-8">
            <h4 class="card-title mt-4 text-center fw-bold">LAPORAN HASIL PERTANIAN</h4>
            <h4 class="card-title my-3 text-center fw-bold">DINAS KELAUTAN PERIKANAN, PERTANIAN DAN PANGAN</h4>
            <h4 class="card-title text-center fw-bold">PEMERINTAH KOTA LHOKSEUMAWE</h4>
        </div>
    </div>
    <hr>
    <!-- Default Table -->
    <table class="table table-bordered">
        @if ($produksis->isNotEmpty())
        <thead>
            <tr>
                <th scope="col" class="text-center">No</th>
                <th scope="col" class="text-center">Tanaman</th>
                <th scope="col" class="text-center">Kecamatan</th>
                <th scope="col" class="text-center">Jumlah (/kuintal)</th>
                <th scope="col" class="text-center">Luas Panen (/hektar)</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produksis as $key => $produksi)
            <tr>
                <th class="text-center" scope="row">{{ ++$key }}</th>
                <td class="text-center">{{ $produksi->tanaman->nama_tanaman }}</td>
                <td class="text-center">{{ $produksi->kecamatan->nama_kecamatan }}</td>
                <td class="text-center">{{ $produksi->jumlah }}</td>
                <td class="text-center">{{ $produksi->luas_panen }}</td>
            </tr>
            @endforeach
            <tr>
                <td class="text-center fw-bold" colspan="3">TOTAL</td>
                <td class="text-center fw-bold">{{ $ttl_jlh }} kuintal</td>
                <td class="text-center fw-bold">{{ $ttl_lp }} hektar</td>
            </tr>
        </tbody>
        @else
        <div class="alert alert-primary text-center" role="alert">
            Data is empty, please add data first!!
        </div>
        @endif
    </table>
    <!-- End Default Table Example -->

    <script>
        window.print();
    </script>
</body>

</html>