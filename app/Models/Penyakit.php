<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    // public $timestamps = false;

    // protected $primaryKey = 'kode_penyakit';
    // public $incrementing = false;
    // protected $keyType = 'string';
}