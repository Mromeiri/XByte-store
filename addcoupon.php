<?php
session_start();
require 'connect.php';
echo $_GET['code'];
$code = $_GET['code'];
$sql = "select * from coupon where coupon_code=:code and CURDATE() BETWEEN dated AND datef";
    $stmt =$pdo->prepare($sql);
    $stmt->execute(["code"=>$code]);
    if ($stmt->rowCount() >0 ) {
        while ($row =$stmt->fetch(pdo::FETCH_ASSOC)) {
            $_SESSION['promo'] = $row['promo'];
        
     }
    }else{
        unset($_SESSION['promo']);
    }
header('location:cart.php#tools');


?>