<?php
session_start();


if (!isset($_SESSION['card'])) {
    $_SESSION['card'] = [];
}
$data = $_GET['id'];
$Array = [];
$Array = $_SESSION['card'];
function pushUniqueNumber(&$array, $number) {
    if (!in_array($number, $array)) {
        $array[] = $number;
    }
}
pushUniqueNumber($Array,$data);
$_SESSION['card']=$Array;
 $_SESSION['card'];
    header("Location: ".$_GET['current_url']);


?>
