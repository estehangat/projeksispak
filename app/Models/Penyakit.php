<?php

namespace App\Models;

use App\Models\HasilDiagnosa;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Penyakit extends Model
{
    use HasFactory;

    protected $table = 'penyakit';

    protected $fillable = [
        'kode_penyakit',
        'penyakit',
        'deskripsi',
        'solusi',
    ];

    public function hasilDiagnosa()
    {
        return $this->hasMany(HasilDiagnosa::class, 'penyakit_id');
    }
}