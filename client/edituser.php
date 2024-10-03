<?php  
session_start();  // Start the session
$show = 0;
include 'connexion.php';

if (isset($_GET["idu"]) && !empty($_GET["idu"])) {
    $id = $_GET["idu"];
    $response = $db->prepare("SELECT * FROM client WHERE id = ?");
    $response->execute(array($id));
    $record = $response->fetch();
    $nom = $record["nom"];
    $prenom = $record["prenom"];
    $email = $record["email"];
    $ps = $record["ps"];
    $adresse = $record["adresse"];
    $tel = $record["telephone"];
}

if (isset($_POST['sauv'])) {
    if (!empty($_POST)) {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $ps = $_POST['ps'];
        $adresse = $_POST['add'];
        $tel = $_POST['tel'];
        // Update query
        $req1 = $db->prepare('UPDATE client SET nom = ?, prenom = ?, email = ?, ps = ?,adresse = ?,telephone = ? WHERE id = ?');
        $req1->execute([$nom, $prenom, $email, $ps,$adresse,$tel, $id]);

        // Update session values
        $_SESSION['nom'] = $nom;
        $_SESSION['prenom'] = $prenom;
        $_SESSION['email'] = $email;

        // Set $show to 1 to trigger the success message
        $show = 1;

        // Redirect to landing page
        header("Location: page_produits.php");
        exit(); // Make sure to exit after redirection
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
  <h2 id="msg">Mettre à jour l'admin</h2>
  <form method="post">
    <div class="user-box">
      <input type="text" id="li" name="nom" value="<?php echo($nom); ?>" required>
      <label for="li">NOM</label>
    </div>
    <div class="user-box">
      <input type="text" name="prenom" value="<?php echo($prenom); ?>" required id="pu">
      <label for="pu">PRENOM</label>
    </div>
    <div class="user-box">
      <input type="email" name="email" required value="<?php echo($email); ?>" id="qte">
      <label for="qte">EMAIL</label>
    </div>
    <div class="user-box">
      <input type="text" name="add" required value="<?php echo($adresse); ?>" id="add">
      <label for="add">ADRESSE</label>
    </div>
    <div class="user-box">
      <input type="text" name="tel" required value="<?php echo($tel); ?>" id="tel">
      <label for="tel">TELEPHONE</label>
    </div>
    <div class="user-box">
      <input type="password" name="ps" required value="<?php echo($ps); ?>" id="desc">
      <label for="desc">MOT DE PASSE</label>
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
  'Le compte a été mis à jour avec succès!',
  'success',
  )
</script>");
}

?>