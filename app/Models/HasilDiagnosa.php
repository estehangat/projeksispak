<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilDiagnosa extends Model
{
    use HasFactory;
    protected $table = 'hasil_diagnosa';
    protected $fillable = [
        'user_id',
        'penyakit_id',
        'biodata_sesi',
        'riwayat_jawaban_sesi',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'biodata_sesi' => 'array',
        'riwayat_jawaban_sesi' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function penyakit()
    {
        return $this->belongsTo(Penyakit::class, 'penyakit_id');
    }
}
