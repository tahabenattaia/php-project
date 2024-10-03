<?php
session_start();
$comm=array();
if (isset($_SESSION["panier"]))
{
        $comm=$_SESSION["panier"][3];
}
$t=0;
if(isset($_SESSION["panier"]))
{
$t=$_SESSION["panier"][1];}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <title>Document</title>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap');

span {
  font-family: 'Bebas Neue', cursive;
  font-size: 3em;
  position: relative;
  top: 50%;
  left: 50%;
  transform: translate(-50%,-50%);
  background-image: linear-gradient(gold, gold);
  background-size: 100% 10px;
  background-repeat: no-repeat;
  background-position: 100% 0%;
   transition: background-size .7s, background-position .5s ease-in-out;
}

span:hover {
  background-size: 100% 100%;
  background-position: 0% 100%;
  transition: background-position .7s, background-size .5s ease-in-out;
}
</style>
<body>
<div class="row col-12 mt-5 p-5">
<span> Votre Panier </span><table class="table table-borderless">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Produit</th>
      <th scope="col">Quantité</th>
      <th scope="col">Total</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    foreach($comm as $index=>$c)
    {
        echo('<tr>
      <th scope="row">'.($index+1).'</th>
      <td>'.$c[4].'</td>
      <td>'.$c[0].'</td>
      <td>'.$c[1].'DT</td>
      <td><a href="supprimer_panier.php?id='.$index.'" title="supprimer cette commande"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="black" d="m12 13.9l1.9 1.9q.3.275.713.275t.687-.275q.3-.3.3-.713t-.3-.687l-1.9-1.9l1.9-1.9q.3-.3.3-.713t-.3-.687q-.275-.3-.688-.3t-.712.3L12 11.1l-1.9-1.9q-.275-.3-.688-.3t-.712.3q-.275.275-.275.688t.275.712l1.9 1.9l-1.9 1.9q-.275.275-.275.688t.275.712q.3.275.713.275t.687-.275l1.9-1.9ZM7 21q-.825 0-1.413-.588T5 19V6q-.425 0-.713-.288T4 5q0-.425.288-.713T5 4h4q0-.425.288-.713T10 3h4q.425 0 .713.288T15 4h4q.425 0 .713.288T20 5q0 .425-.288.713T19 6v13q0 .825-.588 1.413T17 21H7Z"/></svg></a></td>
    </tr>');
    }
    ?>
    
  </tbody>
</table>
<div class="text-end mt-3">
    <h3 style="font-weight:bolder;">Total: <?php echo($t); ?> DT</h3>
<a type="submit" href="valider.php" class="btn btn-outline-primary">Valider</a>

</div>
</div>
</body>
</html>