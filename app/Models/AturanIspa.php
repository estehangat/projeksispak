<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AturanIspa extends Model
{
    use HasFactory;

    protected $table = 'aturan_ispa';

    protected $fillable = [
        'id_gejala_sekarang',
        'jawaban',
        'id_gejala_selanjutnya',
        'id_penyakit_hasil',
        'is_pertanyaan_awal',
    ];

    public function gejalaSekarang()
    {
        return $this->belongsTo(Gejala::class, 'id_gejala_sekarang', 'kode_gejala');
    }

    public function gejalaSelanjutnya()
    {
        return $this->belongsTo(Gejala::class, 'id_gejala_selanjutnya', 'kode_gejala');
    }

    public function penyakitHasil()
    {
        return $this->belongsTo(Penyakit::class, 'id_penyakit_hasil', 'kode_penyakit');
    }
}