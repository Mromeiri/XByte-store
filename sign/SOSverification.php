<?php
session_start();

require '../connect.php';
$username=$_SESSION['username'];
$password=$_SESSION['passsword'];
$firstname=$_SESSION['firstname'];
$lastname=$_SESSION['lastname'];
$random=$_SESSION['random'];
$email=$_SESSION['email'];
$code = $_POST['code'];
echo $_SESSION['random'] ;
if ($random == $code) {
  echo 'yes';
  $sql = "INSERT INTO user (username,firstname,lastname,password,email) VALUES (:username,:firstname,:lastname,:password,:email)";
    $stmt =$pdo->prepare($sql);
    $stmt->execute(["username"=>$username,"firstname"=>$firstname,"lastname"=>$lastname,"password"=>$password,"email"=>$email]);
   header('location:../login') ;

  
} else{
  header('location:../verification') ;

}
