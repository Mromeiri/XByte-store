<?php 
if (isset($_GET['search'])) {
    unset($_GET['search']);
}
if (isset($_GET['text'])) {
    unset($_GET['text']);
}
header("Location: shop");


?>
