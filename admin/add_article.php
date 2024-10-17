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
  margin: 0;
  padding: 0;
  font-family: sans-serif;
  background: linear-gradient(#1b1b1b, #343434); /* Dark gradient */
}

.login-box {
  position: absolute;
  top: 50%;
  left: 50%;
  width: 400px;
  padding: 40px;
  transform: translate(-50%, -50%);
  background: rgba(0, 0, 0, 0.8); /* Darker background */
  box-sizing: border-box;
  box-shadow: 0 15px 25px rgba(0, 0, 0, 0.8); /* Heavier shadow */
  border-radius: 10px;
}

.login-box h2 {
  margin: 0 0 30px;
  padding: 0;
  color: #fff; /* White text */
  font-weight:bold;
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
  border-bottom: 1px solid #fff; /* White border */
  outline: none;
  background: transparent;
}

.login-box .user-box label {
  position: absolute;
  top: 0;
  left: 0;
  padding: 10px 0;
  font-size: 16px;
  color: #fff; /* Light gray text */
  pointer-events: none;
  transition: 0.5s;
}

.login-box .user-box input:focus ~ label,
.login-box .user-box input:valid ~ label {
  top: -20px;
  left: 0;
  color: #ccc; /* White label on focus */
  font-size: 12px;
}

.login-box form a {
  position: relative;
  display: inline-block;
  padding: 10px 20px;
  color: #fff; /* White text */
  font-size: 16px;
  text-decoration: none;
  text-transform: uppercase;
  overflow: hidden;
  transition: 0.5s;
  margin-top: 40px;
  letter-spacing: 4px;
  border: 1px solid #fff; /* White border */
}

.login-box a:hover {
  background: #555; /* Dark gray background on hover */
  color: #fff;
  border-radius: 5px;
}

button {
  margin-top: 20px;
  padding: 25px 30px;
  background: #444; /* Darker button */
  color: #fff; /* White text */
  font-weight: bold;
  font-size: large;
  border: none;
  border-radius: 5px;
  letter-spacing: 4px;
  transition: 0.5s;
  cursor: pointer;
}

button:hover {
  background: #888; /* Lighter gray on hover */
  color: #fff; /* White text on hover */
  box-shadow: 0 0 5px #fff, 0 0 25px #fff, 0 0 50px #fff; /* White glow */
}

#notification {
  font-family: 'Times New Roman', Times, serif;
  position: fixed;
  color: #ddd; /* Light gray notification text */
  background: rgba(0, 0, 0, 0.6); /* Slightly transparent black */
  padding: 0 5rem;
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