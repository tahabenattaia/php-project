<?php
session_start();
include ("functions.php");
$categorie=getAllCategories ();
if(isset($_GET['id']))
$article=getProduit($_GET['id']);
$show=0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="stylep.css">
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.16.6/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <title>Produit</title>
</head>
<body>
<div class="card col-8 offset-5 mt-5" style="width: 18rem;">
  <img src="image/<?php echo $article['image'] ?>" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?php echo $article["libelle"] ?></h5>
    <p class="card-text"><?php echo $article["description"] ?></p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item"><?php echo $article["pu"] ?>DT</li>
    <li class="list-group-item"><?php echo $article["categorie"] ?></li>
   
  </ul>
  <div class="card-body">
  <form action="commander.php" method="post">
   <input type="hidden" name="id" class="form-control mt-2" value="<?php echo $article["id"] ?>">
   <input type="hidden" name="li" class="form-control mt-2" value="<?php echo $article["libelle"] ?>">
  <div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text mt-2 mr-2"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="black" d="M13 10h-2V8h2v2zm0-4h-2V1h2v5zM7 18c-1.1 0-1.99.9-1.99 2S5.9 22 7 22s2-.9 2-2s-.9-2-2-2zm10 0c-1.1 0-1.99.9-1.99 2s.89 2 1.99 2s2-.9 2-2s-.9-2-2-2zm-8.9-5h7.45c.75 0 1.41-.41 1.75-1.03L21 4.96L19.25 4l-3.7 7H8.53L4.27 2H1v2h2l3.6 7.59l-1.35 2.44C4.52 15.37 5.48 17 7 17h12v-2H7l1.1-2z"/></svg></span>
  </div>
  <input type="number" name="qte" class="form-control mt-2" placeholder="la quantité"  aria-label="Amount (to the nearest dollar)">
</div>
  <button type="submit" class="btn btn-outline-primary">Commander</button>
  </div> 
</form>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.16.6/sweetalert2.all.min.js"></script>

</body>
</html>