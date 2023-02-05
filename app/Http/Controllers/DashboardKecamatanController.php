<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Kecamatan;
use Illuminate\Http\Request;

class DashboardKecamatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kecamatans = Kecamatan::latest()->paginate(15)->withQueryString();
        
        return view('dashboard.kecamatan.index', [
            'kecamatans' => $kecamatans
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
            'nama_kecamatan' => 'required|max:55|unique:kecamatans,nama_kecamatan'
        ]);

        Kecamatan::create([
            'nama_kecamatan' => $request->nama_kecamatan
        ]);

        return redirect()->route('kecamatan.index')->with('successKecamatan', 'Sukses, 1 Data kecamatan berhasil ditambahkan!');
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
    public function update(Request $request, Kecamatan $kecamatan)
    {
        $request->validate([
            'nama_kecamatan' => 'required|max:55|unique:kecamatans,nama_kecamatan,' . $kecamatan->id
        ]);

        Kecamatan::where('id', $kecamatan->id)->update([
            'nama_kecamatan' => $request->nama_kecamatan
        ]);

        return redirect()->route('kecamatan.index')->with('successKecamatan', 'Data kecamatan berhasil diperbaharui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kecamatan $kecamatan)
    {
        $item = Kecamatan::findorFail($kecamatan->id);
        $item->delete();
        return redirect()->route('kecamatan.index')->with('successKecamatan', 'Sukses, 1 Data kecamatan berhasil dihapus!');
    }
}
