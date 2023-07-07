<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiUtility extends Model
{
    use HasFactory;
    protected $table='nilai_utilities';
    protected $fillable = [
        'id',
        'utility_score',
        'alternatif_id',
        'kriteria_id'
    ];

}
