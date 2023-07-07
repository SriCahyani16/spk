<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Kriteria extends Model
{
    use HasFactory;
    protected $table='kriteria';
    protected $fillable = [
        'id',
        'name',
        'weight',
        'type'

    ];

    public function penilaian()
    {
        return $this->hasMany(Penilaian::class);
    }
}
