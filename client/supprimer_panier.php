<?php
session_start();
$id=$_GET["id"];
$t=$_SESSION["panier"][3][$id][1];
$_SESSION["panier"][1]-=$t;
unset($_SESSION["panier"][3][$id]);
header('location:panier.php');
?>