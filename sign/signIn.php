<?php 
session_start();

if (isset($_SESSION['mywebsiteanduwontknow'])) {
  header("Location: ../index");
  exit;
}

$host = "localhost";
$user = "root";
$password="";
$dbname = "xbyte";
$port = 3306;
  
//Data Source name (DSN)
$dsn = "mysql:host=".$host.";dbname=".$dbname.";port=".$port;
//Creation du pdo
$pdo = new PDO($dsn,$user,$password);


$username = $_POST['username'];
$passsword = $_POST['password'];



  $sql = "select * from user where username=:username and password=:password";
  $stmt =$pdo->prepare($sql);
  $stmt->execute(["username"=>$username,"password"=>$passsword]);

    if ($stmt->rowCount() == 0) {
      header('location:../login?alert=Password or Username unvalid') ;
    }else{
      if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Verify the login credentials (replace with your own authentication logic)
        
            // Authentication successful, create a session
            $_SESSION["mywebsiteanduwontknow"] = $username;
            $_SESSION["username"] = $username;
            $_SESSION["passsword"] =  $passsword;
            while ($row =$stmt->fetch(pdo::FETCH_ASSOC)) {
              
              $_SESSION["firstname"] =  $row['firstname'];
              $_SESSION["lastname"] =  $row['lastname'];
              $_SESSION["email"] = $row["email"];
              $_SESSION["adress"] = $row["address"];
              
            }
            header("Location:../my-account");
            exit;
        } 
    }
    
    
   

    






?>