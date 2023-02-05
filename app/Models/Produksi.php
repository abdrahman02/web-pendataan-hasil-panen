<?php

namespace App\Models;

use App\Models\Tanaman;
use App\Models\Kecamatan;
use App\Models\TahunPanen;
use App\Models\KlasifikasiTanaman;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produksi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function tahun_panen()
    {
        return $this->belongsTo(TahunPanen::class);
    }

    public function klasifikasi_tanaman()
    {
        return $this->belongsTo(KlasifikasiTanaman::class, 'klasifikasi_id');
    }

    public function tanaman()
    {
        return $this->belongsTo(Tanaman::class, 'tanaman_id');
    }

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class, 'kecamatan_id');
    }

    // protected static function boot()
    // {
    //     parent::boot();

    //     static::deleting(function ($produksi) {
    //         if ($produksi->klasifikasi_tanaman()->count()) {
    //             return false;
    //         }
    //     });

    //     static::deleting(function ($produksi) {
    //         if ($produksi->tahun_panen()->count()) {
    //             return false;
    //         }
    //     });

    //     static::deleting(function ($produksi) {
    //         if ($produksi->tanaman()->count()) {
    //             return false;
    //         }
    //     });

    //     static::deleting(function ($produksi) {
    //         if ($produksi->kecamatan()->count()) {
    //             return false;
    //         }
    //     });
    // }
}
