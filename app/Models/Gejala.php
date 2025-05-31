<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gejala extends Model
{
    use HasFactory;

    protected $table = 'gejala';

    protected $fillable = [
        'kode_gejala',
        'gejala',
    ];

    // public $timestamps = false;

    // protected $primaryKey = 'kode_gejala';
    // public $incrementing = false;
    // protected $keyType = 'string';
}