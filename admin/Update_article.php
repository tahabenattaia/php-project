<?php 
$show=0;
include 'connexion.php';
include "function.php";
$categories=getAllCategories ();
if (isset($_GET["ida"]) && !empty($_GET["ida"])) {
  $id = $_GET["ida"];
  $response = $db->prepare("select * from article where id=?");
  $response->execute(array($id));
  $record = $response->fetch();
  $li = $record["libelle"];
  $pu = $record["pu"];
  $qte = $record["qte"];
  $desc = $record["description"];
  $img = $record["image"];
  $cate=$record["categorie"];
}
 if (isset($_POST['sauv'])) {
  if (!empty($_POST)) {
  $libelle = $_POST['li'];
  $description = $_POST['desc'];
  $pui=$_POST['pu'];
  $qute=$_POST['qte'];
  $image=$_POST['img'];
  $ca=$_POST['categorie'];
      $req1 = $db->prepare('UPDATE  article
                                          SET 
                                          libelle= ? ,
                                          description = ?,
                                          date_modification=?,
                                          pu=?,
                                          qte=?,
                                          image=?,
                                          categorie=?
                                      WHERE id = ?
                                      ');
      $req1->execute([$libelle, $description ,date('Y-m-d'),$pui,$qute,$image,$ca,$id]);
      $show=1;
  } 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.16.6/sweetalert2.min.css">
    <title>Document</title>
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
</body>
</html>
<div class="login-box">
  <h2 id="msg">Mettre à jour un article</h2>
  <form method="post">
    <div class="user-box">
      <input type="text" id="li" name="li" value="<?php echo($li); ?>" required>
      <label for="li">Libelle</label>
    </div>
    <div class="user-box">
      <input type="number" name="pu" value="<?php echo($pu); ?>" required id="pu">
      <label for="pu">Prix Unitaire</label>
    </div>
    <div class="user-box">
      <input type="number" name="qte" required value="<?php echo($qte); ?>" id="qte">
      <label for="qte">Quantité</label>
    </div>
    <div class="user-box">
      <input type="text" name="desc" required value="<?php echo($desc); ?>" id="desc">
      <label for="desc">Description</label>
    </div>
    <div class="user-box">
      <input type="file" name="img" id="img" accept="image/* "required>
      <label for="img">Choisir une image</label>
    </div>
    <div class="user-box">
    <select name="categorie" class="custom-select">
  <option selected><?php echo($cate); ?></option>
  <?php
  foreach ($categories as $c)
  echo ("<option value=".$c["nom"]."></option>");
  ?>
</select>
    </div>
    <div class="user-box">
    <button name="sauv">Sauvegarder</button>
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
  'Le produit a été mis à jour avec succès!',
  'success',
  )
</script>");
}

?>



