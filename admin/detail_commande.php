<?php
session_start();
include ("function.php");
$comm=getAllCommande ();
$id=$_GET["idc"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Libelle</th>
      <th scope="col">Image</th>
      <th scope="col">Quantité</th>
      <th scope="col">Total</th>
    </tr>
  </thead>
  <tbody>
    <?php
    foreach ($comm as $i=>$c)
    {
        if($c["panier"]==$id){
    echo ('<tr>
      <th scope="row">'.$i.'</th>
      <td>'.$c["libelle"].'</td>
      <td> <img style="
        width:94px; 
        height:94px;"
        src="image/'.$c["image"].'" alt="'.$c["libelle"].'"></td>'.
      '<td>'.$c['qte'].'</td>
      <td>'.$c['total'].'</td>
    
    </tr>');}}
    ?>
    
  </tbody>
</table>
</body>
</html>