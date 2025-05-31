<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'email',
        'rating',
        'komentar',
        'diagnosa_penyakit',
        'sesi_diagnosa',
    ];

    protected $casts = [
        'sesi_diagnosa' => 'array',
        'rating' => 'integer',
    ];

    protected $table = 'feedbacks';
}