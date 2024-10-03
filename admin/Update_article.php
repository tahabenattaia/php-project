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
button{
  margin-top:20px;
  padding: 25px 30px;
  background: transparent;
  color: #03e9f4;
  font-weight: bolder;
  font-size:large;
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
.boutton{
    display: flex;
    flex-direction: row;
    justify-content: space-between;
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



