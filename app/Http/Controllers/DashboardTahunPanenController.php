<?php

namespace App\Http\Controllers;

use App\Models\TahunPanen;
use Illuminate\Http\Request;

class DashboardTahunPanenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tahun_panens = TahunPanen::latest()->paginate(15)->withQueryString();
        
                
        return view('dashboard.tahun.index', [
            'tahun_panens' => $tahun_panens
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
            'tahun_panen' => 'required|integer|unique:tahun_panens,tahun_panen'
        ]);

        TahunPanen::create([
            'tahun_panen' => $request->tahun_panen
        ]);

        return redirect()->route('tahun-panen.index')->with('successTahunPanen', 'Sukses, 1 Data tahun panen berhasil ditambahkan!');
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
            'tahun_panen' => 'required|integer|unique:tahun_panens,tahun_panen,' . $id
        ]);

        TahunPanen::where('id', $id)->update([
            'tahun_panen' => $request->tahun_panen
        ]);

        return redirect()->route('tahun-panen.index')->with('successTahunPanen', 'Data tahun panen berhasil diperbaharui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = TahunPanen::findorFail($id);
        $item->delete();
        return redirect()->route('tahun-panen.index')->with('successTahunPanen', 'Sukses, 1 Data tahun panen berhasil dihapus!');
    }
}
