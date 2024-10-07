<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class Principal extends Controller
{
    function principal()
    {
        return view('dashboard');
    }

    function diploma()
    {
        require_once app_path('fpdf/fpdf.php');
        // Crear una instancia de FPDF
        $pdf = new \FPDF('L', 'mm', 'Letter');
        $pdf->SetMargins(0, 0, 0);
        $pdf->SetAutoPageBreak(TRUE, 0);
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->SetCreator('Agustin Sanchez');
        $pdf->Image(public_path('img/fondo-diploma.png'), 0, 0, 280, 216);

        $pdf->SetFont('Arial', '', 46);
        $pdf->SetXY(10, 97);
        $pdf->SetTextColor(0, 0, 128);
        $pdf->Cell(0, 25, mb_convert_encoding("Agustín Sánchez May", 'ISO-8859-1'), 0, 1, 'C');

        $pdf->SetFont('Arial', '', 16);
        $pdf->SetXY(10, 137);
        $pdf->SetTextColor(114, 130, 168);
        $pdf->Cell(0, 0, mb_convert_encoding("Diplomado en ", 'ISO-8859-1'), 0, 1, 'C');

        $pdf->SetFont('Arial', '', 14);
        $pdf->SetXY(10, 200);
        $pdf->SetTextColor(113, 129, 166);
        $pdf->Cell(0, 0, mb_convert_encoding("Guadalajara, Jalisco, fecha", 'ISO-8859-1'), 0, 1, 'C');

        // Enviar el encabezado para que el navegador sepa que es un PDF
        header('Content-Type: application/pdf');
        header('Content-Disposition: inline; filename="documento.pdf"');
        header('Cache-Control: private, max-age=0, must-revalidate');
        header('Expires: 0');
        header('Pragma: public');

        // Salida del PDF
        $pdf->Output();

    }


    function diplomas()
    {
        return view('diplomas.diplomas');
    }
}
