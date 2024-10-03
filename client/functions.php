<?php
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
function search($word){
    include("connexion.php");
    $req="SELECT * From article where libelle like '%$word%'";
    $res=$db->query($req);
    $article=$res->fetchAll();
    return $article;
}
function getProduit($id){
    include("connexion.php");
    $req="SELECT * From article where id=$id";
    $res=$db->query($req);
    $article=$res->fetch();
    return $article;
}
function registeration($data)
{
    include("connexion.php");

    // Préparer la requête pour vérifier si l'email existe déjà
    $req = $db->prepare("SELECT * FROM client WHERE email = ?");
    $req->execute([$data['email']]);
    $client = $req->fetch(); // Récupérer le client s'il existe

    if ($client) {
        // Si un client avec cet email existe déjà, renvoyer un message ou une notification
        echo "<script>alert('Un client avec cet email existe déjà.');</script>";
        return false;  // Retourner faux pour indiquer l'échec de l'enregistrement
    } else {
        // Si le client n'existe pas, hacher le mot de passe
        $pshash = hash('ripemd160', $data['ps']);
        
        // Insérer le nouveau client
        $req = $db->prepare("INSERT INTO client (nom, prenom, email, ps, telephone, adresse, date_creation) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $res = $req->execute([
            $data['nom'], 
            $data['prenom'], 
            $data['email'], 
            $pshash, 
            $data['tel'], 
            $data['adresse'], 
            date('Y-m-d')
        ]);

        // Vérifier si l'insertion s'est bien passée
        if ($res) {
            // Si c'est un succès, rediriger vers la page de connexion
            header('Location: login.php');
            exit();  // Assurez-vous d'utiliser exit après une redirection
        } else {
            // Si l'insertion échoue, renvoyer un message d'erreur
            echo "<script>alert('Erreur lors de l'enregistrement. Veuillez réessayer.');</script>";
            return false;
        }
    }
}
function login ($data)
{
    include("connexion.php");
    $email=$data['email'];
    $pshash=hash('ripemd160',$data['ps']);
    $req="SELECT * FROM client where email='$email' AND ps='$pshash'";
    $res=$db->query($req);
    $client=$res->fetch();
    return $client;
}
function getProductsByCategory($cat_name) {
    include("connexion.php");
    $req = $db->prepare("SELECT * FROM article a , categorie c WHERE  a.categorie = c.nom AND c.nom=?");
    $req->execute([$cat_name]);
    return $req->fetchAll();
}
?>
