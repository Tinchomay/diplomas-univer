<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Alumno;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Imports\AlumnosImport;
use App\Models\Diploma;
use Maatwebsite\Excel\Facades\Excel;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class Principal extends Controller
{
    function principal()
    {
        return view('dashboard');
    }

    function diploma()
    {
        return view('diplomas.diploma');
    }


    function diplomas()
    {
        return view('diplomas.diplomas');
    }

    function generarDiploma(Request $request)
    {
        $uuid = Str::uuid();
        $this->validate($request, [
            'nombre' => 'required',
            'programa' => 'required',
            'folio' => 'required',
            'fecha' => 'required',
        ]);
        $diploma = Diploma::create([
            'nombre' => $request->nombre,
            'diploma' => $request->programa,
            'folio' => $request->folio,
            'fecha' => Carbon::parse($request->fecha)->format('Y-m-d'),
            'uuid' => $uuid
        ]);
        require_once app_path('fpdf/fpdf.php');
        Carbon::setLocale('es');
        $date = Carbon::parse($request->fecha);
        $formattedDate = $date->translatedFormat('d F') . ' del ' . $date->year;
        // Crear una instancia de FPDF
        $pdf = new \FPDF('L', 'mm', 'Letter');
        $pdf->SetMargins(0, 0, 0);
        $pdf->SetAutoPageBreak(TRUE, 0);
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->SetCreator('Agustin Sanchez');
        $pdf->Image(public_path('img/fondo-diploma.png'), 0, 0, 280, 216);

        $pdf->SetFont('Arial', '', Str::length($request->nombre) > 25 ? 35 : 43);
        $pdf->SetXY(10, 97);
        $pdf->SetTextColor(0, 0, 128);
        $pdf->Cell(0, 25, mb_convert_encoding($request->nombre, 'ISO-8859-1'), 0, 1, 'C');

        $pdf->SetFont('Arial', '', 16);
        $pdf->SetXY(10, 137);
        $pdf->SetTextColor(114, 130, 168);
        $pdf->Cell(0, 0, mb_convert_encoding("Diplomado en " . $request->programa, 'ISO-8859-1'), 0, 1, 'C');

        $pdf->SetFont('Arial', '', 11);
        $pdf->SetXY(0, 200);
        $pdf->SetTextColor(113, 129, 166);
        $pdf->Cell(0, 0, mb_convert_encoding("Guadalajara, Jalisco, " . $formattedDate, 'ISO-8859-1'), 0, 1, 'C');

        // Genera el QR con la URL que deseas
        $qrCode = QrCode::format('png')->size(100)->generate(env('APP_URL') . "/validar?token=" . $uuid);

        // Decodifica el QR generado
        $qrCodeData = 'data:image/png;base64,' . base64_encode($qrCode);
        $qrImage = base64_decode(substr($qrCodeData, strpos($qrCodeData, ',') + 1));

        // Guarda temporalmente la imagen QR
        $qrPath = public_path('img/temp_qr.png');
        file_put_contents($qrPath, $qrImage);

        // Inserta el QR en el PDF
        $pdf->Image($qrPath, 15, 165, 40, 40);

        $pdf->SetFont('Arial', '', 6);
        $pdf->SetXY(14, 208);
        $pdf->SetTextColor(0, 0, 0);
        $pdf->Cell(0, 0, $uuid, 0, 1, 'L');

        // Enviar el encabezado para que el navegador sepa que es un PDF
        header('Content-Type: application/pdf');
        header('Content-Disposition: inline; filename="documento.pdf"');
        header('Cache-Control: private, max-age=0, must-revalidate');
        header('Expires: 0');
        header('Pragma: public');

        // Salida del PDF
        $pdf->Output();
    }

    function generarDiplomas(Request $request)
    {
        $this->validate($request, [
            'archivo' => 'required',
        ]);
        Alumno::truncate();
        Excel::import(new AlumnosImport, $request->file('archivo'));
        $alumnos = Alumno::all();

        Carbon::setLocale('es');
        require_once app_path('fpdf/fpdf.php');
        $pdf = new \FPDF('L', 'mm', 'Letter');
        $pdf->SetMargins(0, 0, 0);
        $pdf->SetAutoPageBreak(TRUE, 0);

        foreach($alumnos as $alumno) {
            $date = Carbon::parse($alumno->fecha);
            $formattedDate = $date->translatedFormat('d F') . ' del ' . $date->year;
            $pdf->AddPage();
            $pdf->SetFont('Arial', 'B0', 16);
            $pdf->SetCreator('Agustin Sanchez');
            $pdf->Image(public_path('img/fondo-diploma.png'), 0, 0, 280, 216);

            $pdf->SetFont('Arial', '', Str::length($alumno->nombre) > 25 ? 35 : 43);
            $pdf->SetXY(10, 97);
            $pdf->SetTextColor(0, 0, 128);
            $pdf->Cell(0, 25, mb_convert_encoding($alumno->nombre, 'ISO-8859-1'), 0, 1, 'C');

            $pdf->SetFont('Arial', '', 16);
            $pdf->SetXY(10, 137);
            $pdf->SetTextColor(114, 130, 168);
            $pdf->Cell(0, 0, mb_convert_encoding("Diplomado en " . $alumno->diploma, 'ISO-8859-1'), 0, 1, 'C');

            $pdf->SetFont('Arial', '', 11);
            $pdf->SetXY(0, 200);
            $pdf->SetTextColor(113, 129, 166);
            $pdf->Cell(0, 0, mb_convert_encoding("Guadalajara, Jalisco, " . $formattedDate, 'ISO-8859-1'), 0, 1, 'C');

            $qrCode = QrCode::format('png')->size(100)->generate(env('APP_URL') . "/validar?token=" . $alumno->uuid);
            $qrCodeData = 'data:image/png;base64,' . base64_encode($qrCode);
            $qrImage = base64_decode(substr($qrCodeData, strpos($qrCodeData, ',') + 1));

            // Guardar temporalmente la imagen QR con un nombre único
            $qrPath = public_path('img/temp_qr_' . $alumno->id . '.png');
            file_put_contents($qrPath, $qrImage);

            // Insertar el QR en el PDF
            $pdf->Image($qrPath, 15, 165, 40, 40);

            $pdf->SetFont('Arial', '', 6);
            $pdf->SetXY(14, 208);
            $pdf->SetTextColor(0, 0, 0);
            $pdf->Cell(0, 0, $alumno->uuid, 0, 1, 'L');

            unlink($qrPath);
        }
        // Enviar el encabezado para que el navegador sepa que es un PDF
        header('Content-Type: application/pdf');
        header('Content-Disposition: inline; filename="documento.pdf"');
        header('Cache-Control: private, max-age=0, must-revalidate');
        header('Expires: 0');
        header('Pragma: public');
        // Salida del PDF
        $pdf->Output();
    }
}
