<?php

namespace App\Http\Controllers;

use App\Models\Produksi;
use Illuminate\Http\Request;

class DashboardCetakDataController extends Controller
{
    public function cetakPerKecamatan($kecamatan)
    {
        $produksis = Produksi::where('kecamatan_id', $kecamatan)->latest()->get();
        $a = $produksis->sum('jumlah');
        $d = $produksis->sum('luas_panen');
        return view('dashboard.cetak-data.by-kecamatan.cetak-perkecamatan', [
            'produksis' => $produksis,
            'ttl_jlh' => $a,
            'ttl_lp' => $d
        ]);
    }

    public function cetakKecamatan()
    {
        $produksis = Produksi::orderBy('kecamatan_id', 'asc')->get();
        $a = $produksis->sum('jumlah');
        $d = $produksis->sum('luas_panen');
        return view('dashboard.cetak-data.by-kecamatan.cetak-seluruh', [
            'produksis' => $produksis,
            'ttl_jlh' => $a,
            'ttl_lp' => $d
        ]);
    }

    public function cetakPerKlasifikasi($klasifikasi)
    {
        $produksis = Produksi::where('klasifikasi_id', $klasifikasi)->latest()->get();
        $a = $produksis->sum('jumlah');
        $d = $produksis->sum('luas_panen');
        return view('dashboard.cetak-data.by-klasifikasi.cetak-perklasifikasi', [
            'produksis' => $produksis,
            'ttl_jlh' => $a,
            'ttl_lp' => $d
        ]);
    }

    public function cetakKlasifikasi()
    {
        $produksis = Produksi::orderBy('klasifikasi_id', 'asc')->get();
        $a = $produksis->sum('jumlah');
        $d = $produksis->sum('luas_panen');
        return view('dashboard.cetak-data.by-klasifikasi.cetak-seluruh', [
            'produksis' => $produksis,
            'ttl_jlh' => $a,
            'ttl_lp' => $d
        ]);
    }

    public function cetakPerTahunpanen($tahunpanen)
    {
        $produksis = Produksi::where('tahun_panen_id', $tahunpanen)->latest()->get();
        $a = $produksis->sum('jumlah');
        $d = $produksis->sum('luas_panen');
        return view('dashboard.cetak-data.by-tahun-panen.cetak-pertahun-panen', [
            'produksis' => $produksis,
            'ttl_jlh' => $a,
            'ttl_lp' => $d
        ]);
    }

    public function cetakTahunPanen()
    {
        $produksis = Produksi::orderBy('tahun_panen_id', 'asc')->get();
        $a = $produksis->sum('jumlah');
        $d = $produksis->sum('luas_panen');
        return view('dashboard.cetak-data.by-tahun-panen.cetak-seluruh', [
            'produksis' => $produksis,
            'ttl_jlh' => $a,
            'ttl_lp' => $d
        ]);
    }

    public function cetakPerTanaman($tanaman)
    {
        $produksis = Produksi::where('tanaman_id', $tanaman)->latest()->get();
        $a = $produksis->sum('jumlah');
        $d = $produksis->sum('luas_panen');
        return view('dashboard.cetak-data.by-tanaman.cetak-pertanaman', [
            'produksis' => $produksis,
            'ttl_jlh' => $a,
            'ttl_lp' => $d
        ]);
    }

    public function cetakTanaman()
    {
        $produksis = Produksi::orderBy('tanaman_id', 'asc')->get();
        $a = $produksis->sum('jumlah');
        $d = $produksis->sum('luas_panen');
        return view('dashboard.cetak-data.by-tanaman.cetak-seluruh', [
            'produksis' => $produksis,
            'ttl_jlh' => $a,
            'ttl_lp' => $d
        ]);
    }

    public function cetakKeseluruhan()
    {
        $a = Produksi::sum('jumlah');
        $d = Produksi::sum('luas_panen');
        return view('dashboard.cetak-data.cetak-seluruh.cetak-keseluruhan', [
            'produksis' => Produksi::latest()->get(),
            'ttl_jlh' => $a,
            'ttl_lp' => $d
        ]);
    }
}
