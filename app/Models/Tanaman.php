<?php

namespace App\Models;

use App\Models\Produksi;
use App\Models\Kecamatan;
use App\Models\KlasifikasiTanaman;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tanaman extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function klasifikasi_tanaman()
    {
        return $this->belongsTo(KlasifikasiTanaman::class, 'klasifikasi_id');
    }

    public function produksi()
    {
        return $this->hasMany(Produksi::class);
    }

    public function kecamatan()
    {
        return $this->belongsToMany(Kecamatan::class, 'tanaman_kecamatans', 'tanaman_id', 'kecamatan_id');
    }

    // protected static function boot()
    // {
    //     parent::boot();

    //     static::deleting(function ($tanaman) {
    //         if ($tanaman->kecamatan()->count()) {
    //             return false;
    //         }
    //     });

    //     static::deleting(function ($tanaman) {
    //         if ($tanaman->klasifikasi_tanaman()->count()) {
    //             return false;
    //         }
    //     });
    // }
}
