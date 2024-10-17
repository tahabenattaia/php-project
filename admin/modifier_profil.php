<?php  
session_start();  // Start the session
$show = 0;
include 'connexion.php';

if (isset($_GET["idu"]) && !empty($_GET["idu"])) {
    $id = $_GET["idu"];
    $response = $db->prepare("SELECT * FROM user WHERE id = ?");
    $response->execute(array($id));
    $record = $response->fetch();
    $nom = $record["nom"];
    $prenom = $record["prenom"];
    $email = $record["email"];
    $ps = $record["ps"];
}

if (isset($_POST['sauv'])) {
    if (!empty($_POST)) {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $ps = $_POST['ps'];

        // Update query
        $req1 = $db->prepare('UPDATE user SET nom = ?, prenom = ?, email = ?, ps = ? WHERE id = ?');
        $req1->execute([$nom, $prenom, $email, $ps, $id]);

        // Update session values
        $_SESSION['nom'] = $nom;
        $_SESSION['prenom'] = $prenom;
        $_SESSION['email'] = $email;

        // Set $show to 1 to trigger the success message
        $show = 1;

        // Redirect to landing page
        header("Location: landing page.php");
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
  background:linear-gradient(#1b1b1b, #343434);
}

.login-box {
  position: absolute;
  top: 50%;
  left: 50%;
  width: 400px;
  padding: 40px;
  transform: translate(-50%, -50%);
  background:  rgba(0, 0, 0, 0.8);
  box-sizing: border-box;
  box-shadow: 0 15px 25px rgba(0, 0, 0, 0.8);
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
  border-bottom:  1px solid #fff;
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
  color: #ccc;
  font-size: 12px;
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