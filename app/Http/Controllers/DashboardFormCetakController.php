<?php

namespace App\Http\Controllers;

use App\Models\Produksi;
use Illuminate\Http\Request;

class DashboardFormCetakController extends Controller
{
    public function formCetakKecamatan()
    {
        $a = Produksi::select('kecamatan_id')->distinct()->get();
        return view('dashboard.cetak-data.by-kecamatan.form-cetak', [
            'items' => $a
        ]);
    }

    public function formCetakKlasifikasi()
    {
        $a = Produksi::select('klasifikasi_id')->distinct()->get();
        return view('dashboard.cetak-data.by-klasifikasi.form-cetak', [
            'items' => $a
        ]);
    }
    
    public function formCetakTahunPanen()
    {
        $a = Produksi::select('tahun_panen_id')->distinct()->get();
        return view('dashboard.cetak-data.by-tahun-panen.form-cetak', [
            'items' => $a
        ]);
    }
    
    public function formCetakTanaman()
    {
        $a = Produksi::select('tanaman_id')->distinct()->get();
        return view('dashboard.cetak-data.by-tanaman.form-cetak', [
            'items' => $a
        ]);
    }
}
