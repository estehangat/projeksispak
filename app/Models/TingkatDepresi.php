<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TingkatDepresi extends Model
{
    use HasFactory;
    protected $table = 'tingkat_depresi';
    protected $fillable = [
        'kode_depresi',
        'depresi'
    ];
}
