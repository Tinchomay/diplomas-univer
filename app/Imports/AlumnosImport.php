<?php

namespace App\Imports;

use Carbon\Carbon;
use App\Models\Alumno;
use App\Models\Diploma;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;

class AlumnosImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $uuid = Str::uuid();
        Diploma::create([
            'nombre' => $row[5],
            'diploma' => $row[6],
            'folio' => $row[7],
            'fecha' => Carbon::createFromFormat('d/m/Y', $row[8])->format('Y-m-d'),
            'uuid' => $uuid,
        ]);
        return new Alumno([
            'ingreso'=>$row[0],
            'ciclo'=>$row[1],
            'plantel'=>$row[2],
            'licenciatura'=>$row[3],
            'idpwc'=>$row[4],
            'nombre'=>$row[5],
            'diploma'=>$row[6],
            'folio'=>$row[7],
            'fecha'=>Carbon::createFromFormat('d/m/Y', $row[8])->format('Y-m-d'),
            'nombreAdministrativo' => $row[9],
            'uuid' => $uuid
        ]);
    }
}
