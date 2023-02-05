<?php

namespace App\Models;

use App\Models\Produksi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TahunPanen extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    public function produksi()
    {
        return $this->hasMany(Produksi::class);
    }
}
