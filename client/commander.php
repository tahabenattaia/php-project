<?php
session_start();
include "connexion.php";
include "functions.php"; 

$client = $_SESSION['id'];

if (!isset($_SESSION['nom'])) {
    header('location:login.php');
    exit();
}

$idp = $_POST["id"];
$li = $_POST["li"];
$qte = $_POST["qte"];

// Vérifier la quantité en stock pour l'article (champ 'qte' pour la quantité)
$req = $db->prepare('SELECT pu, qte FROM article WHERE id = ?');
$req->execute(array($idp));

if ($req->rowCount() > 0) {
    $article = $req->fetch();

    // Vérifier si la quantité demandée est disponible en stock
    if ($article['qte'] >= $qte) {
        // Calculer le total pour cet article
        $prix = $article["pu"];
        $total = $qte * $prix;

        // Mise à jour du stock (réduction de la quantité)
        $new_stock = $article['qte'] - $qte;
        $update_stock = $db->prepare('UPDATE article SET qte = ? WHERE id = ?');
        $update_stock->execute(array($new_stock, $idp));

        // Ajouter l'article au panier
        $date = date('Y-m-d');
        if (!isset($_SESSION["panier"])) {
            $_SESSION["panier"] = array($client, 0, $date, array());
        }

        $_SESSION["panier"][1] += $total;
        $_SESSION["panier"][3][] = array($qte, $total, $date, $date, $li);

        // Retour à la page du panier
        header('location:panier.php');
        exit();
    } else {
        // Si la quantité demandée dépasse le stock disponible
        echo "<script>alert('Désolé, il n'y a pas assez de stock pour cet article.')</script>";
    }
} else {
    echo "<script>alert('L'article sélectionné n'existe pas.')</script>";
}
?>