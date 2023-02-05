<?php

namespace App\Models;

use App\Models\Tanaman;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KlasifikasiTanaman extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function tanaman()
    {
        return $this->hasMany(Tanaman::class);
    }
}
