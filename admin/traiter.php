<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Document</title>
    <script>
        // Function to validate input before submitting
        function validateInput() {
            var inputVal = document.getElementById('exampleInputEmail1').value.trim().toLowerCase();
            // Only allow 'en livraison' or 'livraison terminée'
            if (inputVal === "en livraison" || inputVal === "livraison terminée") {
                return true; // Allow form submission
            } else {
                alert("Veuillez entrer 'en livraison' ou 'livraison terminée' seulement.");
                return false; // Prevent form submission
            }
        }
    </script>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap');

* {
    margin: 0;
    padding: 0;
    font-family: 'Open Sans', sans-serif;
    box-sizing: border-box;
}

body {
    width: 100vw;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    overflow-x: hidden;
}
.button {
    cursor: pointer;
    margin-top: 30px;
    width: 300px;
    height: 60px;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: rgb(184, 255, 112);
    color: #212121;
    font-weight: 600;
    box-shadow: 2px 4px 8px rgba(45, 87, 5, 0.247);
}
p{
    font-size: 30px;
    font-weight: normal;
}

/* title styles */
.home-title span{
    position: relative;
    overflow: hidden;
    display: block;
    line-height: 1.2;
}

.home-title span::after{
    content: '';
    position: absolute;
    top: 0;
    right: 0;
    width: 100%;
    height: 100%;
    background: white;
    animation: a-ltr-after 2s cubic-bezier(.77,0,.18,1) forwards;
    transform: translateX(-101%);
}

.home-title span::before{
    content: '';
    position: absolute;
    top: 0;
    right: 0;
    width: 100%;
    height: 100%;
    background: var(--bg-color);
    animation: a-ltr-before 2s cubic-bezier(.77,0,.18,1) forwards;
    transform: translateX(0);
}

.home-title span:nth-of-type(1)::before,
.home-title span:nth-of-type(1)::after{
    animation-delay: 1s;
}

.home-title span:nth-of-type(2)::before,
.home-title span:nth-of-type(2)::after{
    animation-delay: 1.5s;
}

@keyframes a-ltr-after{
    0% {transform: translateX(-100%)}
    100% {transform: translateX(101%)}
}

@keyframes a-ltr-before{
    0% {transform: translateX(0)}
    100% {transform: translateX(200%)}
}
</style>
<body>
    <h1>Traiter la commande</h1>
    <form method="post" onsubmit="return validateInput()">
        <input type="text" required name="select" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Entrer l'état">
        <small id="emailHelp" class="form-text text-muted">en livraison ou livraison terminée</small>
        <button type="submit" name="btn" class="btn btn-primary mt-2">Sauvegarder</button>
    </form>
    
    <?php
    $id=$_GET["idc"];
    if (!empty($_POST))
    {
        include("connexion.php");
        $req="UPDATE panier SET etat='".$_POST['select']."' WHERE id='".$id."'";
        $res=$db->query($req);
        header('location:liste_commande.php');
    }
    ?>
</body>
</html>
