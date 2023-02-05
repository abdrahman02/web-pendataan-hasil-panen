<?php

namespace App\Models;

use App\Models\Tanaman;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kecamatan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function tanaman()
    {
        return $this->belongsToMany(Tanaman::class, 'tanaman_kecamatans', 'tanaman_id', 'kecamatan_id');
    }

    // protected static function boot()
    // {
    //     parent::boot();

    //     static::deleting(function ($kecamatan) {
    //         if ($kecamatan->tanaman()->count()) {
    //             return false;
    //         }
    //     });
    // }
}
