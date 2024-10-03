<?php
function log_in ($data)
{
    include("connexion.php");
    $email=$data['email'];
    $pshash=hash('ripemd160',$data['ps']);
    $req="SELECT * FROM user where email='$email' AND ps='$pshash'";
    $res=$db->query($req);
    $users=$res->fetch();
    return $users;
}
function getAllCategories ()
{
 include("connexion.php");
 $req ="SELECT * from categorie ";
 $res=$db->query($req);
 $categorie=$res->fetchAll();
 return $categorie;
}
function getAllProducts(){
    include("connexion.php");
    $req ="SELECT * from article ";
    $res=$db->query($req);
    $article=$res->fetchAll();
    return $article;
}
function getAllClients ()
{
 include("connexion.php");
 $req ="SELECT * from client  ";
 $res=$db->query($req);
 $client=$res->fetchAll();
 return $client;
}
function getAllPanier ()
{
 include("connexion.php");
 $req ="SELECT p.etat,  p.id, c.nom , c.prenom , p.total , p.etat , p.date_creation from panier p , client c where p.client=c.id ";
 $res=$db->query($req);
 $comm=$res->fetchAll();
 return $comm;
}
function getAllCommande() {
    include("connexion.php");
    $req ="SELECT a.image, a.libelle, c.qte, c.total, c.panier FROM article a, commande c WHERE c.article=a.libelle";
    $res = $db->query($req);
    $row = $res->fetchAll();
    return $row;
}
function getAllAvis ()
{
 include("connexion.php");
 $req ="SELECT * from avis ";
 $res=$db->query($req);
 $avis=$res->fetchAll();
 return $avis;
}
function getCommandesByDate($date) {
    include("connexion.php"); // Assurez-vous d'avoir une connexion PDO à votre base de données
    $stmt = $pdo->prepare("SELECT * FROM commande WHERE date_creation = :date");
    $stmt->execute(['date' => $date]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

?>