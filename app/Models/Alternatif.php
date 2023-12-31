<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternatif extends Model
{
    protected $table='alternatif';
    protected $fillable = [
        'id',
        'name',
        'jk',
        'asalsekolah',
        'jurusan'
    ];

    public function penilaian()
    {
        return $this->hasMany(Penilaian::class);
    }

    public function nilaiAkhir()
    {
        return $this->hasOne(NilaiAkhir::class);
    }
}
