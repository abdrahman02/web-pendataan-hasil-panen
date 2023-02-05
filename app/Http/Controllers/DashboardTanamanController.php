<?php

namespace App\Http\Controllers;

use App\Models\Tanaman;
use Illuminate\Http\Request;
use App\Models\KlasifikasiTanaman;

class DashboardTanamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tanamans = Tanaman::latest()->paginate(15)->withQueryString();
        $klasifikasi_tanamans = KlasifikasiTanaman::all();

        return view('dashboard.tanaman.index', [
            'klasifikasi_tanamans' => $klasifikasi_tanamans,
            'tanamans' => $tanamans
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
        $request->validate([
            'klasifikasi_id' => 'required',
            'nama_tanaman' => 'required|max:55'
        ]);

        Tanaman::create([
            'klasifikasi_id' => $request->klasifikasi_id,
            'nama_tanaman' => $request->nama_tanaman
        ]);

        return redirect()->route('tanaman.index')->with('successTanaman', 'Sukses, 1 Data Tanaman berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tanaman  $tanaman
     * @return \Illuminate\Http\Response
     */
    public function show(Tanaman $tanaman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tanaman  $tanaman
     * @return \Illuminate\Http\Response
     */
    public function edit(Tanaman $tanaman)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tanaman  $tanaman
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tanaman $tanaman)
    {
        $request->validate([
            'klasifikasi_id' => 'required',
            'nama_tanaman' => 'required|max:55'
        ]);

        Tanaman::where('id', $tanaman->id)->update([
            'klasifikasi_id' => $request->klasifikasi_id,
            'nama_tanaman' => $request->nama_tanaman
        ]);

        return redirect()->route('tanaman.index')->with('successTanaman', 'Sukses, 1 Data Tanaman berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tanaman  $tanaman
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tanaman $tanaman)
    {
        $item = Tanaman::findorFail($tanaman->id);
        $item->delete();
        return redirect()->route('tanaman.index')->with('successTanaman', 'Sukses, 1 Data tanaman berhasil dihapus!');
    }
}
