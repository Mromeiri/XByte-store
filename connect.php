<?php 
$host = "localhost";
$user = "root";
$password="";
$dbname = "xbyte";
$port = 3306;
  
//Data Source name (DSN)
$dsn = "mysql:host=".$host.";dbname=".$dbname.";port=".$port;
//Creation du pdo
$pdo = new PDO($dsn,$user,$password);

?>