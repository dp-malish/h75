<?php
/**
 * Created by PhpStorm.
 * User: Аватар
 * Date: 09.08.2017
 * Time: 00:12
 */

define('FPDF_FONTPATH','/Library/WebServer/Documents/derby/font/');

require( 'fpdf.php' );

$pdf = new FPDF();
$pdf->SetFont('Arial','',72);
$pdf->AddPage();
$pdf->Cell(40,10,"Hello World!",15);
$pdf->Output();
