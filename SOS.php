<?php
session_start();
if (isset($_COOKIE['myCookie'])) {
    $jsonQte = $_COOKIE['myCookie'];
    $qteArray = json_decode($jsonQte, true);
}
if (isset($_COOKIE['to'])) {
    $jsonQte = $_COOKIE['to'];
    $total = json_decode($jsonQte, true);
}
$Array = $_SESSION['card'];
$itemArray = $_SESSION['card'];
require 'connect.php';
$state = $_POST['state'];
$lastname = $_POST['lastname'];
$firstname = $_POST['firstname'];
$company = $_POST['company'];
$adress = $_POST['adress'];
$commune = $_POST['commune'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$maxid=0;
$stmt = $pdo ->query("SELECT max(order_id) FROM orders");
    while ($row =$stmt->fetch(pdo::FETCH_ASSOC)) {
      $maxid= $row['max(order_id)']+1;

    }
echo $state,$lastname,$firstname,$company,$adress,$commune,$email,$phone;
$sql = "select * from client where phone=:phone";
    $stmt =$pdo->prepare($sql);
    $stmt->execute(["phone"=>$phone]);

    if ($stmt->rowCount() == 0) {
        $sql = "INSERT INTO client (firstname,lastname,email,phone,address) VALUES (:firstname,:lastname,:email,:phone,:adress)";
    $stmt =$pdo->prepare($sql);
    $stmt->execute(["firstname"=>$firstname,"lastname"=>$lastname,"email"=>$email,"adress"=>$adress,"phone"=>$phone]);
    }
    if (isset($_SESSION['username'])) {
        $sql = "INSERT INTO orders (customer_id,order_id,name,order_date,total,status,shipping_address,phone,email,promo) VALUES (:customer_id,:id,:name,NOW(),:total,'progress',:adress,:phone,:email,:promo)";
        $stmt =$pdo->prepare($sql);
        $stmt->execute(["customer_id"=>$_SESSION['username'],"id"=>$maxid,"name"=>$lastname,"total"=>$total,"adress"=>$adress,"phone"=>$phone,"email"=>$email,"promo"=>$_COOKIE['promo']]);
    }else{
    $sql = "INSERT INTO orders (order_id,name,order_date,total,status,shipping_address,phone,email,promo) VALUES (:id,:name,NOW(),:total,'progress',:adress,:phone,:email,:promo)";
    $stmt =$pdo->prepare($sql);
    $stmt->execute(["id"=>$maxid,"name"=>$lastname,"total"=>$total,"adress"=>$adress,"phone"=>$phone,"email"=>$email,"promo"=>$_COOKIE['promo']]);}
    for ($i=0; $i <count($qteArray) ; $i++) { 
        $sql = "INSERT INTO order_items (order_id,product_id,qty) VALUES (:id,:produit,:qte)";
        $stmt =$pdo->prepare($sql);
        $stmt->execute(["id"=>$maxid,"produit"=>$Array[$i],"qte"=>$qteArray[$i]]);
        }
        header("Location: index");
        












?>