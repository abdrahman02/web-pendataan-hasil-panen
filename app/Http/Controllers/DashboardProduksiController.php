<?php

namespace App\Http\Controllers;

use App\Models\Tanaman;
use App\Models\Produksi;
use App\Models\Kecamatan;
use App\Models\TahunPanen;
use Illuminate\Http\Request;
use App\Models\KlasifikasiTanaman;

class DashboardProduksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Produksi $produksi)
    {
        $tanamans = Tanaman::all();
        $klasifikasi_tanamans = KlasifikasiTanaman::all();
        $kecamatans = Kecamatan::all();
        $tahun_panens = TahunPanen::all();
        $produksis = Produksi::latest()->paginate(15)->withQueryString();

        return view('dashboard.produksi.index', [
            'tanamans' => $tanamans,
            'klasifikasi_tanamans' => $klasifikasi_tanamans,
            'kecamatans' => $kecamatans,
            'tahun_panens' => $tahun_panens,
            'produksis' => $produksis,
            'produksii' => $produksi
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id_tanaman = $request->tanaman_id;
        $tanaman = Tanaman::where('id', $id_tanaman)->first();
        $id_klasifikasi = $tanaman->klasifikasi_id;

        $request->validate([
            'tanaman_id' => 'required',
            'kecamatan_id' => 'required',
            'tahun_panen_id' => 'required',
            'jumlah' => 'required',
            'luas_panen' => 'required'
        ]);

        Produksi::create([
            'tanaman_id' => $request->tanaman_id,
            'klasifikasi_id' => $id_klasifikasi,
            'kecamatan_id' => $request->kecamatan_id,
            'tahun_panen_id' => $request->tahun_panen_id,
            'jumlah' => $request->jumlah,
            'luas_panen' => $request->luas_panen
        ]);

        return redirect()->route('produksi.index')->with('successProduksi', 'Sukses, 1 Data produksi panen berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produksi  $produksi
     * @return \Illuminate\Http\Response
     */
    public function show(Produksi $produksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produksi  $produksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Produksi $produksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produksi  $produksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produksi $produksi)
    {
        $id_tanaman = $request->tanaman_id;
        $tanaman = Tanaman::where('id', $id_tanaman)->first();
        $id_klasifikasi = $tanaman->klasifikasi_id;

        $request->validate([
            'tanaman_id' => 'required',
            'kecamatan_id' => 'required',
            'tahun_panen_id' => 'required',
            'jumlah' => 'required',
            'luas_panen' => 'required'
        ]);

        Produksi::where('id', $produksi->id)->update([
            'tanaman_id' => $request->tanaman_id,
            'klasifikasi_id' => $id_klasifikasi,
            'kecamatan_id' => $request->kecamatan_id,
            'tahun_panen_id' => $request->tahun_panen_id,
            'jumlah' => $request->jumlah,
            'luas_panen' => $request->luas_panen
        ]);

        return redirect()->route('produksi.index')->with('successProduksi', 'Sukses, 1 Data produksi panen berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produksi  $produksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produksi $produksi)
    {
        $item = Produksi::findorFail($produksi->id);
        $item->update();
        return redirect()->route('produksi.index')->with('successProduksi', 'Sukses, 1 Data produksi panen berhasil dihapus!');
    }
}
