<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'ingreso',
        'ciclo',
        'plantel',
        'licenciatura',
        'idpwc',
        'nombre',
        'diploma',
        'folio',
        'fecha',
        'nombreAdministrativo',
    ];
}
