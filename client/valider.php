<?php
session_start();
include "connexion.php";
include "functions.php"; 
$client=$_SESSION["id"];
$total=$_SESSION["panier"][1];
$date=date('Y-m-d');
  $req2 = $db->prepare('insert into panier (total,client,date_creation) values (?,?,?)');
  $res2 = $req2->execute(array($total,$client,$date));
  $panier_id=$db->lastinsertid();
  $comm=$_SESSION["panier"][3];
  foreach ($comm as $c)
  {
   $req1 = $db->prepare('insert into commande (qte,total,article,date_creation,date_modification,panier) values (?,?,?,?,?,?)');
    $res1 = $req1->execute(array($c[0],$c[1],$c[4],$date,$date,$panier_id));
    
  }
  $_SESSION["panier"]=null;
 header('location:page_produits.php');
?>