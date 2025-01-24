<?php
require_once('../vendor/tecnickcom/tcpdf/tcpdf.php');

$pdf = new TCPDF();
$pdf->AddPage();

// Set the initial position for the first cell
$imagePath = '../assets/images/product/1.jfif';

// Set the position for the image
$imageX = 10;
$imageY = 70;

// Set the image dimensions (width and height)
$imageWidth = 50;
$imageHeight = 50;

// Add the image to the PDF
$pdf->Image($imagePath, $imageX, $imageY, $imageWidth, $imageHeight);

$pdf->Output('example.pdf', 'D');
?>