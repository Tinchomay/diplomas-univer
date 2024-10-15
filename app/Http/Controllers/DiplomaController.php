<?php

namespace App\Http\Controllers;

use App\Models\Diploma;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DiplomaController extends Controller
{
    public function index(Request $request)
    {
        $token = $request->query('token');

        $diploma = Diploma::where('uuid', $token)->first();
        if($diploma){
            $date = Carbon::parse($diploma->fecha);
            $formattedDate = $date->translatedFormat('d F') . ' del ' . $date->year;
        }
        return view('validation.index', [
            'diploma' => $diploma,
            'formattedDate' => $formattedDate ?? ''
        ]);
    }
}
