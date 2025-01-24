<?php
session_start();


if (!isset($_SESSION['card'])) {
    $_SESSION['card'] = [];
}
$data = $_GET['id'];
$Array = [];
$Array = $_SESSION['card'];



$index = array_search($data, $Array);

// If the number exists in the array, remove it using unset()
if ($index !== false) {
    unset($Array[$index]);
}

// Reindex the array after removing the element
$Array = array_values($Array);


$_SESSION['card']=$Array;
print_r($_SESSION['card']);
header("Location: cart.php");

?>
