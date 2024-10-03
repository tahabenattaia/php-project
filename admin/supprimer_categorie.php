<?php
$idca=$_GET["idc"];
include ("connexion.php");
$req=$db->prepare("DELETE from categorie where id=?");
$res=$req->execute(array($idca));
if ($res)
{
    header('location:liste_categorie.php');
}
?>