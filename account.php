<?php
session_start();
require 'connect.php';


$username = $_SESSION['username'];
  $pass =  $_SESSION["passsword"];


  if (isset($_POST['changepass'])) {

    $currentpass = $_POST["currentpass"];
    $newpass = $_POST["newpass"];
    echo $newpass;
    echo $currentpass;
    if ($pass == $currentpass) {
        $sql = "UPDATE user set password =:password where username=:username";
        $stmt =$pdo->prepare($sql);
        $stmt->execute(["password"=>$newpass, "username"=>$username]);
        $_SESSION["passsword"] = $newpass;
        header('location:my-account');
    }

  }else{  
    $newusername = $_POST["username"];
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
if (!empty($firstname) || !empty($lastname) || !empty($email)) {
    # code...

    $sql = "UPDATE user SET";

// Check if each input field is empty
if (!empty($firstname)) {
    $sql .= " firstname = :firstname,";
}
if (!empty($lastname)) {
    $sql .= " lastname = :lastname,";
}
if (!empty($email)) {
    $sql .= " email = :email,";
}

// Remove the trailing comma and complete the query with the WHERE clause
$sql = rtrim($sql, ",") . " WHERE username = :id";

// Prepare the query
$stmt = $pdo->prepare($sql);

// Bind the parameters
if (!empty($firstname)) {
    $stmt->bindParam(':firstname', $firstname);
    $_SESSION['firstname'] = $firstname;
}
if (!empty($lastname)) {
    $stmt->bindParam(':lastname', $lastname);
    $_SESSION['lastname'] = $lastname;
}
if (!empty($email)) {
    $stmt->bindParam(':email', $email);
    $_SESSION['email'] = $email;
}

$stmt->bindParam(':id', $_SESSION['username']);

// Execute the query
$stmt->execute();
//header('location:my-account');
}

if (!empty($newusername)) {
    $sql = "select * from user where username=:username";
    $stmt =$pdo->prepare($sql);
    $stmt->execute(["username"=>$newusername]);
    if ($stmt->rowCount() >0 ) {
    header('location:my-account?alert=Username exist#register') ;
    exit ;
} else{
    $sql = "UPDATE user SET username=:newusername where username=:username";
    $stmt =$pdo->prepare($sql);
    $stmt->execute(["newusername"=>$newusername,"username"=>$username]);
    
    $sql = "UPDATE orders SET customer_id=:newusername where customer_id=:username";
    $stmt =$pdo->prepare($sql);
    $stmt->execute(["newusername"=>$newusername,"username"=>$username]);
$_SESSION['username'] = $newusername;
}
}
  }


//  isset($_POST['changepassword']);
//  if (isset($_POST['changepass'])) {

// if ($pass == $currentpass) {
//   echo "hi";
//   $newpassword = $_POST["newpassword"];

//   $_SESSION["passsword"] = $newpassword;
//   $sql = "UPDATE login set password =:password where username=:username";
//     $stmt =$pdo->prepare($sql);
//     $stmt->execute(["password"=>$newpassword, "username"=>$username]);
//     header('location:../index.php');
    

  
// }else header('location:account.php?alert=Wrong password');

//  }else{
//   if ($pass == $currentpass) {
//     $sql = "select * from login where username=:username";
//     $stmt =$pdo->prepare($sql);
//     $stmt->execute(["username"=>$newusername]);
//     if ($stmt->rowCount() >0 ) {
//     header('location:account.php?alert=Username exist#register') ;
//     }else{
//       $_SESSION["username"] =$newusername;
//       $sql = "UPDATE login set username =:newusername where username=:username";
//       $stmt =$pdo->prepare($sql);
//       $stmt->execute(["newusername"=>$newusername, "username"=>$username]);
//       header('location:../index.php');

//     }
    
      
  
    
//   }else header('location:account.php?alert=Wrong password');

//  }
header('location:my-account');
?>