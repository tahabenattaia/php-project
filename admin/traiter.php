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
        background-color: #1b1b1b; /* Dark background */
        color: white; /* White text */
    }

    h1 {
        font-size: 32px;
        font-weight: bold;
        margin-bottom: 20px;
    }

    form {
        width: 100%;
        max-width: 400px;
        padding: 20px;
        background: rgba(0, 0, 0, 0.8); /* Darker form background */
        border-radius: 10px;
        box-shadow: 0 0 15px rgba(255, 255, 255, 0.1); /* Soft glow effect */
    }

    .form-control {
        background-color: transparent; /* Transparent background for inputs */
        border: 1px solid #fff; /* White borders */
        color: #fff; /* White text */
    }

    .form-control::placeholder {
        color: #ccc; /* Light gray placeholder */
    }

    .form-text {
        color: #ccc; /* Light gray for helper text */
    }

    .btn-primary {
        background-color: transparent;
        border: 2px solid #fff; /* White border */
        color: #fff;
        font-weight: bold;
        letter-spacing: 2px;
        transition: 0.5s;
    }

    .btn-primary:hover {
        background-color: #fff; /* White background on hover */
        color: #000; /* Black text on hover */
        box-shadow: 0 0 10px #fff, 0 0 30px #fff; /* Glow effect */
    }

    .button {
        cursor: pointer;
        margin-top: 30px;
        width: 300px;
        height: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: transparent;
        color: #fff; /* White text */
        font-weight: bold;
        border: 1px solid #fff; /* White border */
        box-shadow: 0 0 10px #fff, 0 0 30px #fff; /* Soft glow */
        transition: 0.5s;
    }

    .button:hover {
        background-color: #fff;
        color: #000;
    }

    p {
        font-size: 30px;
        font-weight: normal;
    }
</style>
<body>
    <h1>Traiter la commande</h1>
    <form method="post" onsubmit="return validateInput()">
        <input type="text" required name="select" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Entrer l'état">
        <small id="emailHelp" class="form-text">en livraison ou livraison terminée</small>
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
