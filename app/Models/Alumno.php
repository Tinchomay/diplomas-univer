<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;
    protected $fillable = [
        'ingreso',
        'ciclo',
        'plantel',
        'licenciatura',
        'id',
        'nombre',
        'diploma',
        'folio',
        'fecha',
        'nombreAdministrativo',
    ];
}
