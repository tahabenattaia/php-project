<?php
$idar=$_GET["ida"];
include ("connexion.php");
$req=$db->prepare("DELETE from article where id=?");
$res=$req->execute(array($idar));
if ($res)
{
    header('location:liste_article.php');
}
?>