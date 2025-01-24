<?php
session_start();
require 'connect.php';
$name = $_POST['name'];
$email = $_POST['email'];
$comment = $_POST['comment'];
$maxid=0;
$stmt = $pdo ->query("SELECT max(review_id) FROM review");
    while ($row =$stmt->fetch(pdo::FETCH_ASSOC)) {
      $maxid= $row['max(review_id)']+1;

    }
    $sql = "INSERT INTO review (review_id,name,email,comment,item_id) VALUES (:id,:name,:email,:comment,:item)";
    $stmt =$pdo->prepare($sql);
    $stmt->execute(["id"=>$maxid,"name"=>$name,"email"=>$email,"comment"=>$comment,"item"=>$_SESSION['productdetail']]);
    header("Location: product-details?id=".$_SESSION['productdetail']);











?>