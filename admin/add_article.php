<?php
session_start();
$show=0;
include ('function.php');
$categorie=getAllCategories();
$article=getAllProducts();
        if (isset($_POST["add"])) {
          if (empty($article))
          {
            include ("connexion.php");
            $response = $db->prepare("insert into article (libelle,pu,qte,image,description,createur,date_creation,categorie) values(?,?,?,?,?,?,?,?)");
            $response->execute(array($_POST["li"], $_POST["pu"],$_POST["qte"], $_POST["img"],$_POST["desc"],$_SESSION['nom'],date('Y-m-d'),$_POST['categorie']));
            $show=1;
          }
          else{
          foreach ($article as $a)
          {
          if($_POST["li"]!=$a["libelle"] && $_POST["img"]!=$a["image"] ){
            include ("connexion.php");
            $response = $db->prepare("insert into article (libelle,pu,qte,image,description,createur,date_creation,categorie) values(?,?,?,?,?,?,?,?)");
            $response->execute(array($_POST["li"], $_POST["pu"],$_POST["qte"], $_POST["img"],$_POST["desc"],$_SESSION['nom'],date('Y-m-d'),$_POST['categorie']));
            $show=1;}
            else{
              $show=2;
            }
          }
        }
      }
    ?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <title>ajouter un article</title>
</head>
<style>
html {
  height: 100%;
}
body {
  margin:0;
  padding:0;
  font-family: sans-serif;
  background: linear-gradient(#141e30, #243b55);
}

.login-box {
  position: absolute;
  top: 50%;
  left: 50%;
  width: 400px;
  padding: 40px;
  transform: translate(-50%, -50%);
  background: rgba(0,0,0,.5);
  box-sizing: border-box;
  box-shadow: 0 15px 25px rgba(0,0,0,.6);
  border-radius: 10px;
}

.login-box h2 {
  margin: 0 0 30px;
  padding: 0;
  color: #fff;
  text-align: center;
}

.login-box .user-box {
  position: relative;
}

.login-box .user-box input {
  width: 100%;
  padding: 10px 0;
  font-size: 16px;
  color: #fff;
  margin-bottom: 30px;
  border: none;
  border-bottom: 1px solid #fff;
  outline: none;
  background: transparent;
}
.login-box .user-box label {
  position: absolute;
  top:0;
  left: 0;
  padding: 10px 0;
  font-size: 16px;
  color: #fff;
  pointer-events: none;
  transition: .5s;
}

.login-box .user-box input:focus ~ label,
.login-box .user-box input:valid ~ label {
  top: -20px;
  left: 0;
  color: #03e9f4;
  font-size: 12px;
}

.login-box form a {
  position: relative;
  display: inline-block;
  padding: 10px 20px;
  color: #03e9f4;
  font-size: 16px;
  text-decoration: none;
  text-transform: uppercase;
  overflow: hidden;
  transition: .5s;
  margin-top: 40px;
  letter-spacing: 4px
}

.login-box a:hover {
  background: #03e9f4;
  color: #fff;
  border-radius: 5px;
  box-shadow: 0 0 5px #03e9f4,
              0 0 25px #03e9f4,
              0 0 50px #03e9f4,
              0 0 100px #03e9f4;
}

.login-box a span {
  position: absolute;
  display: block;
}

.login-box a span:nth-child(1) {
  top: 0;
  left: -100%;
  width: 100%;
  height: 2px;
  background: linear-gradient(90deg, transparent, #03e9f4);
  animation: btn-anim1 1s linear infinite;
}

@keyframes btn-anim1 {
  0% {
    left: -100%;
  }
  50%,100% {
    left: 100%;
  }
}

.login-box a span:nth-child(2) {
  top: -100%;
  right: 0;
  width: 2px;
  height: 100%;
  background: linear-gradient(180deg, transparent, #03e9f4);
  animation: btn-anim2 1s linear infinite;
  animation-delay: .25s
}

@keyframes btn-anim2 {
  0% {
    top: -100%;
  }
  50%,100% {
    top: 100%;
  }
}

.login-box a span:nth-child(3) {
  bottom: 0;
  right: -100%;
  width: 100%;
  height: 2px;
  background: linear-gradient(270deg, transparent, #03e9f4);
  animation: btn-anim3 1s linear infinite;
  animation-delay: .5s
}

@keyframes btn-anim3 {
  0% {
    right: -100%;
  }
  50%,100% {
    right: 100%;
  }
}

.login-box a span:nth-child(4) {
  bottom: -100%;
  left: 0;
  width: 2px;
  height: 100%;
  background: linear-gradient(360deg, transparent, #03e9f4);
  animation: btn-anim4 1s linear infinite;
  animation-delay: .75s
}

@keyframes btn-anim4 {
  0% {
    bottom: -100%;
  }
  50%,100% {
    bottom: 100%;
  }
}
input[type="file"]{
  display=none;
  margin-top:20px;
}
button{
  margin-top:20px;
  padding: 25px 30px;
  background: transparent;
  color: #03e9f4;
  font-weight: bold;
  border: none;
  border-radius: 5px;
  letter-spacing: 4px;
  overflow: hidden;
  transition: 0.5s;
  cursor: pointer;
}

button:hover{
    background: #03e9f4;
    color: #050801;
    box-shadow: 0 0 5px #03e9f4,
                0 0 25px #03e9f4,
                0 0 50px #03e9f4,
                0 0 200px #03e9f4;
}
#notification {
  font-family: 'Times New Roman', Times, serif;
  position: fixed;
  color: #90e0ef;
  background: transparent;
  padding:0  5rem;
  visibility: hidden;
}
</style>
<body>
<div class="login-box">
  <h2 id="msg">Ajouter un article</h2>
  <form method="post">
    <div class="user-box">
      <input type="text" id="li" name="li" required>
      <label for="li">Libelle</label>
    </div>
    <div class="user-box">
      <input type="number" name="pu" required id="pu">
      <label for="pu">Prix Unitaire</label>
    </div>
    <div class="user-box">
      <input type="number" name="qte" required id="qte">
      <label for="qte">Quantité</label>
    </div>
    <div class="user-box">
      <input type="text" name="desc" required id="desc">
      <label for="desc">Description</label>
    </div>
    <div class="user-box">
      <input type="file" name="img" id="img" accept="image/* " required>
      <label for="img">Choisir une image</label>
    </div>
    <div class="user-box">
    <select name="categorie" class="custom-select">
  <option selected>choisir une catégorie</option>
  <?php
  foreach ($categorie as $c)
  echo ("<option value=".$c["nom"].">".$c["nom"]."</option>");
  ?>
</select>
    </div>
    <div class="user-box">
    <button name="add">AJOUTER</button>
</div>
  </form>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.16.6/sweetalert2.all.min.js"></script>
<?php
if ($show==1)
{
echo( "<script>
  Swal.fire(
  'Succès!',
  'L\'article a été créé avec succès!',
  'success',
  )
</script>");
}
if ($show==2)
{
echo( "<script>
Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Cette libelle existe déjà',
})
</script>");
}
?>
</body>
</html>