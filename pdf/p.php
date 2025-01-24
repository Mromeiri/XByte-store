<?php 
session_start();
require'../connect.php';
$sql = "select * from orders where order_id=:id ";
$stmt =$pdo->prepare($sql);
$stmt->execute(["id"=>$_GET['id']]); 
while ($row =$stmt->fetch(pdo::FETCH_ASSOC)) {

//echo ($_GET['id']);
require_once('../vendor/tecnickcom/tcpdf/tcpdf.php');


// Create a new PDF instance
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Set document information
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

$pdf->AddPage();

$pdf->SetFont('helvetica','B',36);
$pdf->Cell(0,22,'XByte Store',0,1,'C',0,'',false,'M','M');
$pdf->SetFont('helvetica','B',14);
$pdf->Cell(0,15,'Bytes of Brilliance',0,1,'C',0,'',false,'M','M');
$pdf->SetFont('helvetica','B',12);
$pdf->Cell(0,15,'IT services , Shopping and consultation',0,1,'C',0,'',false,'M','M');
$pdf->SetFont('helvetica','',10);
$pdf->Cell(72,15,'Email : omeiri.abdellah@gmail.com',0,0,'L',0,'',false,'M','M');
$pdf->Cell(50,15,'Mobile : 0657 27 19 42',0,0,'C',0,'',false,'M','M');
$pdf->Cell(50,15,'Instagram : xbyte.store',0,1,'R',0,'',false,'M','M');

$pdf->Line(10,49,200,49);
$pdf->Line(10,51,200,51);

$pdf->SetFont('times','BI',12);
$pdf->ln(15);
$pdf->Cell(180,15,'Date : '.$row['order_date'],0,1,'R',0,'',false,'M','M');
$pdf->ln(3);
$pdf->Cell(90,10,'Order Number : '.$row['order_id'],0,0,'L',0,'',false,'M','M');
$pdf->Cell(90,10,'Customer id : '.$row['customer_id'],0,1,'M',0,'',false,'M','M');
$pdf->ln(3);
$pdf->Cell(90,10,'Firstname : '.$_SESSION['firstname'],0,0,'L',0,'',false,'M','M');
$pdf->Cell(90,10,'Lastname : '.$_SESSION['lastname'],0,1,'M',0,'',false,'M','M');
$pdf->ln(3);
$pdf->Cell(90,10,'Email : '.$row['email'],0,0,'L',0,'',false,'M','M');
$pdf->Cell(90,10,'Phone : '.$row['phone'],0,1,'M',0,'',false,'M','M');
$pdf->ln(3);
$pdf->Cell(90,10,'Status : '.$row['status'],0,0,'L',0,'',false,'M','M');
$pdf->Cell(90,10,'TOTAL : '.$row['total'].' DA',0,1,'M',0,'',false,'M','M');
$pdf->ln(3);
$pdf->Cell(90,10,'Shipping Address : '.$row['shipping_address'],0,1,'M',0,'',false,'M','M');

$pdf->SetFont('times','',12);
$pdf->ln(3);

$tbl = <<<EOD
<table style="border-collapse: collapse; margin: 25px 0; font-size: 1em; font-family: sans-serif; min-width: 400px; box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);">
    <thead>
        <tr style="background-color: #009879; color: #ffffff; text-align: left;">
            <th style="padding: 20px;">Item Name</th>
            <th style="padding-bottom: 200px;">Price</th>
            <th style="padding: 20px;">Qty</th>
            <th style="padding: 20px;">Amount</th>
        </tr>
    </thead>
    <tbody>
        <tr style="border-bottom: 1px solid #dddddd;">
            <td style="padding: 20px;">Product A</td>
            <td style="padding: 20px;">$100</td>
            <td style="padding: 20px;">2</td>
            <td style="padding: 20px;">$200</td>
        </tr>
        <tr style="border-bottom: 1px solid #dddddd; background-color: #f3f3f3;">
            <td style="padding: 20px;">Product B</td>
            <td style="padding: 20px;">$150</td>
            <td style="padding: 20px;">1</td>
            <td style="padding: 20px;">$150</td>
        </tr>
        <!-- and so on... -->
    </tbody>
</table>

EOD;
$pdf->writeHTML($tbl,true,false,false,false,'');
}$pdf->output('example.pdf','I');
?>