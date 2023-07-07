<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiAkhir extends Model
{
    use HasFactory;
    protected $table='nilai_akhir';
    protected $fillable = [
        'id',
        'alternatif_id',
        'nilai_akhir'
    ];

    public function alternatif()
    {
        return $this->belongsTo(Alternatif::class);
    }
}
