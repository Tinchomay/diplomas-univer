<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diploma extends Model
{
    use HasFactory;

    protected $casts = [
        'fecha' => 'date',
    ];

    protected $fillable = [
        'nombre',
        'diploma',
        'folio',
        'fecha',
        'uuid'
    ];
}
