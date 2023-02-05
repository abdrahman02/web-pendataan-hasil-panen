<?php

namespace App\Http\Controllers;

use App\Models\KlasifikasiTanaman;
use Illuminate\Http\Request;

class DashboardKlasifikasiTanamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $klasifikasi_tanamans = KlasifikasiTanaman::latest()->paginate(15)->withQueryString();
        
        return view('dashboard.klasifikasi.index', [
            'klasifikasi_tanamans' => $klasifikasi_tanamans
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
            'nama_klasifikasi' => 'required|max:55|unique:klasifikasi_tanamen,nama_klasifikasi'
        ]);

        KlasifikasiTanaman::create([
            'nama_klasifikasi' => $request->nama_klasifikasi
        ]);

        return redirect()->route('klasifikasi-tanaman.index')->with('successKlasifikasi', 'Sukses, 1 Data klasifikasi tanaman berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_klasifikasi' => 'required|max:55|unique:klasifikasi_tanamen,nama_klasifikasi,' . $id
        ]);

        KlasifikasiTanaman::where('id', $id)->update([
            'nama_klasifikasi' => $request->nama_klasifikasi
        ]);

        return redirect()->route('klasifikasi-tanaman.index')->with('successKlasifikasi', 'Data klasifikasi tanaman berhasil diperbaharui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(KlasifikasiTanaman $klasifikasi_tanaman)
    {
        $item = KlasifikasiTanaman::findorFail($klasifikasi_tanaman->id);
        $item->delete();
        return redirect()->route('klasifikasi-tanaman.index')->with('successKlasifikasi', 'Sukses, 1 Data klasifikasi tanaman berhasil dihapus!');
    }
}
