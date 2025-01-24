<?php 
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
$username = $_POST['username'];
$passsword = $_POST['password'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$_SESSION['username'] = $username ;
$_SESSION['passsword'] = $passsword ;
$_SESSION['firstname'] = $firstname ;
$_SESSION['lastname'] = $lastname ;
$_SESSION['email'] = $email ;

$etat = "Membre";

require '../connect.php';

  $sql = "select * from user where username=:username";

  $stmt =$pdo->prepare($sql);
  $stmt->execute(["username"=>$username]);
  if ($stmt->rowCount() >0 ) {
    header('location:../register?alert=Username exist') ;
    exit ;
  }

  $sql = "select count(*) from user where email=:email";
  $stmt =$pdo->prepare($sql);
  $stmt->execute(["email"=>$email]);
  while ($row =$stmt->fetch(pdo::FETCH_ASSOC)) {
    
    if ($row['count(*)']>0) {
      header('location:../register?alert=email exist') ;
    exit ;
    }
    
  }
  $random = rand(100000, 999999);
  $_SESSION['random'] = $random;
  $mail = new PHPMailer(true);

  try {
      //Server settings
      $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
      $mail->isSMTP();                                            //Send using SMTP
      $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
      $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
      $mail->Username   = 'omeiri.abdellah@gmail.com';                     //SMTP username
      $mail->Password   = 'nesrrpvhdlcmotdo';                              //SMTP password
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
      $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
  
      //Recipients
      $mail->setFrom('omeiri.abdellah@gmail.com', 'XByte');
      $mail->addAddress($email, 'Tested');     //Add a recipient
      $mail->addReplyTo('omeiri.abdellah@gmail.com', 'Information');
  
        //Optional name
  
      //Content
      $mail->isHTML(true);                                  //Set email format to HTML
      $mail->Subject = 'SignUp verification';
      $mail->Body    =$random;
      $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
  
      $mail->send();
      echo 'Message has been sent';
  } catch (Exception $e) {
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }
  $_SESSION['random'] = $random;
  header('location:../verification');
    // $sql = "INSERT INTO user (username,firstname,lastname,password,email) VALUES (:username,:firstname,:lastname,:password,:email)";
    // $stmt =$pdo->prepare($sql);
    // $stmt->execute(["username"=>$username,"firstname"=>$firstname,"lastname"=>$lastname,"password"=>$passsword,"email"=>$email]);
   // header('location:../login') ;
    ?>