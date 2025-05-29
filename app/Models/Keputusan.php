<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Keputusan extends Model
{
    use HasFactory;
    protected $table = 'keputusan';

    public function depresi()
    {
        return $this->hasMany(TingkatDepresi::class, 'kode_depresi', 'kode_depresi');
    }
    
    public function gejala()
    {
        return $this->hasMany(Gejala::class, 'kode_gejala' /* tbl gejala */, 'kode_gejala');
    }
}
