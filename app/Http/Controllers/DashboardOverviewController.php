<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\TahunPanen;
use Illuminate\Http\Request;
use App\Models\KlasifikasiTanaman;

class DashboardOverviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kecamatans = Kecamatan::latest()->paginate(15)->withQueryString();
        $klasifikasi_tanamans = KlasifikasiTanaman::latest()->paginate(15)->withQueryString();
        $tahun_panens = TahunPanen::latest()->paginate(15)->withQueryString();

        return view('dashboard.overview.index', [
            'page_title' => 'Dashboard',
            'kecamatans' => $kecamatans,
            'klasifikasi_tanamans' => $klasifikasi_tanamans,
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
