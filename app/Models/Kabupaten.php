<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kabupaten extends Model
{
    use HasFactory;
    
    protected $fillable = ['nama_kabupaten', 'provinsi_id'];

    public function rumahSakits()
    {
        return $this->hasMany(RumahSakit::class);
    }

    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class);
    }
}