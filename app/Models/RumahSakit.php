<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RumahSakit extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_rs',
        'alamat',
        'no_telp',
        'website_url',
        'kabupaten_id',
        'deskripsi_tambahan'
    ];

    public function kabupaten()
    {
        return $this->belongsTo(Kabupaten::class);
    }
}