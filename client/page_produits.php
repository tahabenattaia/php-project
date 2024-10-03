<?php
session_start();
include ("functions.php");
$categorie = getAllCategories();
$article = getAllProducts();

// Vérifier si une catégorie est sélectionnée
if (isset($_GET['cat_name'])) {
    $article = getProductsByCategory($_GET['cat_name']); // Fonction pour récupérer les produits par catégorie
} elseif (isset($_POST['search'])) {
    $article = search($_POST['search']);
} else {
    $article = getAllProducts();
}
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <title>Produit</title>
</head>
<style>
 #bt{
    margin-left:80%;
    margin-top: -6.5%;
   }
   #bt button{
     padding: 25px 30px;
     display: flex;
     flex-direction: column;
     background-color: transparent;
     color: #03e9f4;
     font-weight: bold;
     border: none;
     border-radius: 5px;
     letter-spacing: 4px;
     overflow: hidden;
     transition: 0.5s;
     cursor:pointer;
   }
   #bt button:hover{
       background: #03e9f4;
       color: #050801;
   }
   #bn{
    margin-left:80%;
    margin-top: -3%;
   }
   #bn button{
     padding: 25px 30px;
     display: flex;
     flex-direction: column;
     background-color: transparent;
     color: #03e9f4;
     font-weight: bold;
     border: none;
     border-radius: 5px;
     letter-spacing: 4px;
     overflow: hidden;
     transition: 0.5s;
     cursor:pointer;
   }
   #bn button:hover{
       background: #03e9f4;
       color: #050801;
   }
   .bn{
    font-size: 15px;
    text-decoration: none;
    color: white;
    outline: none;
    font-family: poppins;
  }
  .bn:hover{
   color: #000;
 }
   .b{
     font-size: 15px;
     text-decoration: none;
     color: white;
     outline: none;
     font-family: poppins;
   }
   .b:hover{
    color: #000;
  }
</style>
<body>
<div class="banner">
<img alt="SELENE" title="SELENE " src="image/logo.png" class="logo">
<form action="page_produits.php" method="post">
  <input type="search" name="search" placeholder="recherche" required>
  <button type="submit"><i class="fa fa-search"></i></button>
  <a href="javascript:void(0)" id="clear-btn">Clear</a>
</form>
<div class="dropdown">
  <button class="dropbtn">Catégories</button>
  <div class="dropdown-content">
    <?php
    foreach ($categorie as $c)
    echo ('<a href="page_produits.php?cat_name='.$c['nom'].'">'.$c['nom'].'</a>');
    ?>
  <a href="landing_page.php">Revenir à l'acceuil</a>
  </div>
</div>

<?php 
if (isset ($_SESSION['nom'])) {
  echo ('<div id="bt">
  <button ><a class="bn" href="logout.php" >Logout<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="white" d="m17 7l-1.41 1.41L18.17 11H8v2h10.17l-2.58 2.58L17 17l5-5zM4 5h8V3H4c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h8v-2H4V5z"/></svg></a>
   </button><button ><a class="b" href="edituser.php?idu='. $_SESSION["id"].'">Modifier<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="white" d="m9.25 22l-.4-3.2q-.325-.125-.613-.3t-.562-.375L4.7 19.375l-2.75-4.75l2.575-1.95Q4.5 12.5 4.5 12.337v-.674q0-.163.025-.338L1.95 9.375l2.75-4.75l2.975 1.25q.275-.2.575-.375t.6-.3l.4-3.2h5.5l.4 3.2q.325.125.613.3t.562.375l2.975-1.25l2.75 4.75l-2.575 1.95q.025.175.025.338v.674q0 .163-.05.338l2.575 1.95l-2.75 4.75l-2.95-1.25q-.275.2-.575.375t-.6.3l-.4 3.2h-5.5Zm2.8-6.5q1.45 0 2.475-1.025T15.55 12q0-1.45-1.025-2.475T12.05 8.5q-1.475 0-2.488 1.025T8.55 12q0 1.45 1.012 2.475T12.05 15.5Z"/></svg></a>
     </button> </div>');
   if (isset($_SESSION["panier"]) && is_array($_SESSION["panier"][3])){
   echo( '<a style="margin-left:1400px;" title="votre panier" href="panier.php"><svg xmlns="http://www.w3.org/2000/svg" width="29" height="29" viewBox="0 0 1024 1024"><path fill="white" d="M1015.66 284a31.82 31.82 0 0 0-25.998-13.502H310.526l-51.408-177.28c-20.16-69.808-68.065-77.344-87.713-77.344H34.333c-17.569 0-31.777 14.224-31.777 31.776S16.78 79.425 34.332 79.425h137.056c4.336 0 17.568 0 26.593 31.184l176.848 649.936c3.84 13.712 16.336 23.183 30.591 23.183h431.968c13.409 0 25.376-8.4 29.905-21.024l152.256-449.68c3.504-9.744 2.048-20.592-3.888-29.024zM815.026 720.194H429.539L328.387 334.066h616.096zM752.003 848.13c-44.192 0-80 35.808-80 80s35.808 80 80 80s80-35.808 80-80s-35.808-80-80-80zm-288 0c-44.192 0-80 35.808-80 80s35.808 80 80 80s80-35.808 80-80s-35.808-80-80-80z"/></svg></a><p style="margin-top:-20px;margin-left:1440px;color:white;">'.count($_SESSION["panier"][3]).'</p>');}
   else
   {
    echo( '<a style="margin-left:1400px;" title="votre panier" href="panier.php"><svg xmlns="http://www.w3.org/2000/svg" width="29" height="29" viewBox="0 0 1024 1024"><path fill="white" d="M1015.66 284a31.82 31.82 0 0 0-25.998-13.502H310.526l-51.408-177.28c-20.16-69.808-68.065-77.344-87.713-77.344H34.333c-17.569 0-31.777 14.224-31.777 31.776S16.78 79.425 34.332 79.425h137.056c4.336 0 17.568 0 26.593 31.184l176.848 649.936c3.84 13.712 16.336 23.183 30.591 23.183h431.968c13.409 0 25.376-8.4 29.905-21.024l152.256-449.68c3.504-9.744 2.048-20.592-3.888-29.024zM815.026 720.194H429.539L328.387 334.066h616.096zM752.003 848.13c-44.192 0-80 35.808-80 80s35.808 80 80 80s80-35.808 80-80s-35.808-80-80-80zm-288 0c-44.192 0-80 35.808-80 80s35.808 80 80 80s80-35.808 80-80s-35.808-80-80-80z"/></svg></a><p style="margin-top:-20px;margin-left:1440px;color:white;"> 0</p>');
   }
  }
else {
  echo('<div id="bt">
    <button ><a class="b" href="login.php" >Login<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="white" d="M10 11H2.048c.502-5.053 4.765-9 9.95-9c5.523 0 10 4.477 10 10s-4.477 10-10 10c-5.185 0-9.448-3.947-9.95-9h7.95v3l5-4l-5-4v3Z"/></svg></a>
     </button>
     <button ><a class="b" href="register.php">Register<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="white" d="M12 2c5.523 0 10 4.477 10 10s-4.477 10-10 10S2 17.523 2 12S6.477 2 12 2Zm.5 5H8v10h2v-3h2.217l2.18 3h2.472l-2.55-3.51a3.5 3.5 0 0 0-1.627-6.486L12.5 7Zm0 2a1.5 1.5 0 0 1 1.493 1.355L14 10.5l-.007.145a1.5 1.5 0 0 1-1.348 1.348L12.5 12H10V9h2.5Z"/></svg></a>
     </button>
    </div>
</div>');
}
 ?>
 
<div class="row col-12 mt-5 p-5">
<?php
    foreach ($article as $a){
      echo('<div class="row col-3">
      <div class="card" style="width: 18rem;">
        <img class="card-img-top" src="image/'.$a["image"].'" alt="'.$a["libelle"].'">
        <div class="card-body">
          <h5 class="card-title">'.$a["libelle"].'</h5>
          <h6 class="card-title">'.$a["pu"].'DT</h6>
          <p class="card-text">'.$a["description"].'</p>
          <a href="produits.php?id='.$a["id"].'" class="btn btn-primary">Afficher les détails</a>
        </div>
      </div>
          </div>');
    }
    ?>
</div>
<footer>
    <div class="footer-content" style="margin-top:25px;">
        <h3>SELENE</h3>
        <p>SELENE est une entreprise de produits électroniques réputée pour la qualité de ses produits et services. Depuis sa création, la marque s'est engagée à offrir des produits électroniques innovants, élégants et performants.</p>
         <div class="footer-bottom">
            <p>copyright &copy;2023 <a href="#">SELENE</a>  </p>
         </div>
         <div class="footer-menu">
            <ul class="f-menu">
               <li><a href="landing_page.php">Acceuil</a></li>
            </ul>
           </div>
    </div>
</footer>
<script>
    const clearInput = () => {
  const input = document.getElementsByTagName("input")[0];
  input.value = "";
}

const clearBtn = document.getElementById("clear-btn");
clearBtn.addEventListener("click", clearInput);
</script>
</body>
</html>