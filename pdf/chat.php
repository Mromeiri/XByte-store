<?php 
function formatNumberWithSpaces($number) {
    $number = (string) $number;
    $length = strlen($number);

    if ($length <= 3) {
        return $number; // No need to format if the number has 3 digits or less
    }

    $formatted = '';
    $groupSize = 3;
    $remainingDigits = $length % $groupSize;
    $formatted .= substr($number, 0, $remainingDigits);

    while ($remainingDigits < $length) {
        if (!empty($formatted)) {
            $formatted .= ' '; // Add a space separator after each group of three digits
        }
        $formatted .= substr($number, $remainingDigits, $groupSize);
        $remainingDigits += $groupSize;
    }

    return $formatted;
}
function numberToWord($number) {
    $words = array(
        0 => 'zero', 1 => 'one', 2 => 'two', 3 => 'three', 4 => 'four',
        5 => 'five', 6 => 'six', 7 => 'seven', 8 => 'eight', 9 => 'nine',
        10 => 'ten', 11 => 'eleven', 12 => 'twelve', 13 => 'thirteen',
        14 => 'fourteen', 15 => 'fifteen', 16 => 'sixteen', 17 => 'seventeen',
        18 => 'eighteen', 19 => 'nineteen', 20 => 'twenty', 30 => 'thirty',
        40 => 'forty', 50 => 'fifty', 60 => 'sixty', 70 => 'seventy',
        80 => 'eighty', 90 => 'ninety'
    );

    if ($number <= 20) {
        return $words[$number];
    }

    if ($number < 100) {
        $tens = floor($number / 10) * 10;
        $units = $number % 10;
        return $words[$tens] . '-' . $words[$units];
    }

    if ($number < 1000) {
        $hundreds = floor($number / 100);
        $remaining = $number % 100;

        $result = $words[$hundreds] . ' hundred';

        if ($remaining > 0) {
            $result .= ' and ' . numberToWord($remaining);
        }

        return $result;
    }

    if ($number <= 1000000) {
        $thousands = floor($number / 1000);
        $remaining = $number % 1000;

        $result = numberToWord($thousands) . ' thousand';

        if ($remaining > 0) {
            $result .= ' ' . numberToWord($remaining);
        }

        return $result;
    }

    return $number; // For numbers greater than 1000000, return as is
}

// Example usage:
$number = 1000000;
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
$imagePath = '../assets/images/logo/xbyte-high-resolution-logo-color-on-transparent-background.png';

// Set the position for the image
$imageX = 70;
$imageY = 10;

// Set the image dimensions (width and height)
$imageWidth = 55;
$imageHeight = 14;

// Add the image to the PDF
$pdf->Image($imagePath, $imageX, $imageY, $imageWidth, $imageHeight);
$imagePath = '../assets/images/logo/pdf1.png';

// Set the position for the image
$imageX = 68;
$imageY = 25;

// Set the image dimensions (width and height)
$imageWidth = 70;
$imageHeight = 7;

// Add the image to the PDF
$pdf->Image($imagePath, $imageX, $imageY, $imageWidth, $imageHeight);
// $pdf->Line(10,35,200,35);
$pdf->SetFont('helvetica','B',12);
$pdf->SetXY(10, 38);
$pdf->Cell(72,15,'Contact',0,0,'L',0,'',false,'M','M');
$pdf->SetXY(120, 38);
$pdf->Cell(50,15,'Details',0,1,'L',0,'',false,'M','M');

$pdf->SetFont('helvetica','',10);
$pdf->SetXY(10, 44);
$pdf->Cell(50,15,'Email : omeiri.abdellah@gmail.com',0,0,'L',0,'',false,'M','M');
$pdf->SetXY(120, 44);
$pdf->Cell(50,15,'Customer id : '.$row['customer_id'],0,1,'L',0,'',false,'M','M');

$pdf->SetXY(10, 50);
$pdf->Cell(50,15,'Mobile : 0657 27 19 42',0,0,'L',0,'',false,'M','M');
$pdf->SetXY(120, 50);
$pdf->Cell(50,15,'Email : '.$row['email'],0,1,'L',0,'',false,'M','M');

$pdf->SetXY(10, 56);
$pdf->Cell(50,15,'Instagram : xbyte.store',0,0,'L',0,'',false,'M','M');
$pdf->SetXY(120, 56);
$pdf->Cell(50,15,'Phone : '.$row['phone'],0,1,'L',0,'',false,'M','M');
$pdf->SetXY(120, 62);
$pdf->Cell(50,15,'Shipping Address : '.$row['shipping_address'],0,1,'L',0,'',false,'M','M');






$pdf->SetFont('helvetica','B',16);
$pdf->ln(3);
$pdf->SetY(90);
$pdf->Cell(0,15,'Purchase order',0,1,'C',0,'',false,'M','M');
$pdf->SetY(120);
$pdf->SetFont('helvetica','',12);

$tbl = <<<EOD
<table cellpadding="7" style="border-collapse: collapse; margin:0; font-size: 1em; font-family: sans-serif; min-width: 400px; box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);">
        <tr style="background-color: #012030; color: #ffffff; text-align: center;">
            <th style="padding: 20px;">Item Name</th>
            <th style="padding: 20px;">Price</th>
            <th style="padding: 20px;">Qty</th>
            <th style="padding: 20px;">Amount</th>
        </tr>
EOD;
$sql = "select * from order_items,item where order_id=:id and id=product_id  ";
$stmt =$pdo->prepare($sql);
$stmt->execute(["id"=>$_GET['id']]); 
$myArray = array();
while ($ro =$stmt->fetch(pdo::FETCH_ASSOC)) {

    $name = $ro['name'];
    $sql = "select price FROM price where product_id =:id and  valid_from <=:date ORDER BY valid_from DESC LIMIT 1;";
                                                    $stm =$pdo->prepare($sql);
                                                    $stm->execute(["id"=>$ro['product_id'],"date"=>$row['order_date']]);
                                                    while ($roo =$stm->fetch(pdo::FETCH_ASSOC)) {
    $price = $roo['price'];
                                                    }
    $qty = $ro['qty'];    
    $item1 = array('name' => $name, 'price' => $price, 'qty' => $qty);
    array_push($myArray, $item1);

}
$lenght = count($myArray);
$total = 0;
foreach ($myArray as $item) {
    $name = $item['name'];
    $price = $item['price'];
    
    $qty = $item['qty'];
    $amount = $price*$qty;
    $total +=$amount;$price = formatNumberWithSpaces($price);
    $amount = formatNumberWithSpaces($amount);
$tbl .= <<<EOD
        <tr style=" color: #012030; text-align: center;">
            <th style="padding: 20px;">$name</th>
            <th style="padding: 20px;">$price DA</th>
            <th style="padding: 20px;">$qty</th>
            <th style="padding: 20px;">$amount DA</th>
        </tr>
    
            
EOD;
}
$total = $row['total']-$row['promo'];
$word = numberToWord($total);
$total = formatNumberWithSpaces($total);
$promo = $row['promo'];
$promo = formatNumberWithSpaces($promo);
$tbl .= <<<EOD
            <tr style=" color: #012030; text-align: center;">
                <th style="padding: 20px;"></th>
                <th style="padding: 20px;"></th>
                <th style="padding: 20px;"></th>
                <th style="padding: 20px;">Reduction : $promo DA</th>
            </tr>
            <tr style=" color: #012030; text-align: center;">
                <th style="padding: 20px;"></th>
                <th style="padding: 20px;"></th>
                <th style="padding: 20px;"></th>
                <th style="padding: 20px;">TOTAL : $total DA</th>
            </tr>
        </table>
            
    
            
EOD;
}



$pdf->writeHTML($tbl,true,false,false,false,'');
//$pdf->writeHTML($tb,true,false,false,false,'');
$pdf->SetFont('helvetica','',10);
$pdf->Cell(72,15,'In words :',0,0,'L',0,'',false,'M','M');
$pdf->SetX(27);
$pdf->SetFont('helvetica','B',10);
$pdf->Cell(72,15,$word,0,1,'L',0,'',false,'M','M');

$pdf->output('example.pdf','D');
?>